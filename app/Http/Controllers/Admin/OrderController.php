<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Orderdetail;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->middleware(['admin','backinvalidate']);
        $this->request = $request;
    }

    public function Recentorders( Request $request){

        $orders = Order::where(['orderstatid'=>2, 'ispaid'=>1])
                        ->with(['user','orderstatus'])
                        ->orderBy('created_at','DESC')

                        ->get();

        if ($request->ajax()) {
            return Datatables::of($orders)
                ->editColumn('orderrefno', function ($orders) {
                    $url = route('list.orders.details',['id'=>$orders->orderid, 'order'=>1]);
                    return "<a href='".$url."'>" . $orders->orderrefno . "</a>";
                })
                ->editColumn('orderstatid', function ($orders) {
                    return $orders->orderstatus->ordstatname;
                })
                ->editColumn('created_at', function ($orders) {
                    return $orders->getFormattedDateAttribute();
                })
                ->addColumn('orderby', function ($orders) {
                    return $orders->user->userprofile->fullname();
                })
                ->addColumn('checkbox', '<input name="orderid[]" class="orders" type="checkbox" value="{{$orderid}}">')
                ->rawColumns(['checkbox','action','orderid','orderrefno'])
                ->addIndexColumn()
                ->make(true);
        }

        if($this->request->reloadorder){

            return view('admin.order.partials.ordertable', compact('orders'));
        }


        return view('admin.order.recent', compact('orders'));
    }

    public function Processorders(Request $request){

        $orders = Order::where('orderstatid',3)
            ->with(['user','orderstatus'])
            ->orderBy('created_at','DESC')
            ->get();


        if ($request->ajax()) {
            return Datatables::of($orders)
                ->editColumn('orderrefno', function ($orders) {
                    $url = route('list.orders.details',['id'=>$orders->orderid,'order'=>1]);
                    return "<a href='".$url."'>" . $orders->orderrefno . "</a>";
                })
                ->editColumn('orderstatid', function ($orders) {
                    return $orders->orderstatus->ordstatname;
                })
                ->editColumn('created_at', function ($orders) {
                    return $orders->getFormattedDateAttribute();
                })
                ->addColumn('orderby', function ($orders) {
                    return $orders->user->userprofile->fullname();
                })
                ->addColumn('checkbox', '<input name="orderid[]" class="orders" type="checkbox" value="{{$orderid}}">')
                ->rawColumns(['checkbox','action','orderrefno'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('admin.order.processing', compact('orders'));
    }

    public function Readytodeliver(Request $request){

        $orders = Order::where('orderstatid',4)
            ->with(['user','orderstatus'])
            ->orderBy('created_at','DESC')
            ->get();

        if ($request->ajax()) {
            return Datatables::of($orders)
                ->editColumn('orderrefno', function ($orders) {
                    $url = route('list.orders.details',['id'=>$orders->orderid,'order'=>1]);
                    return "<a href='".$url."'>" . $orders->orderrefno . "</a>";
                })
                ->editColumn('orderstatid', function ($orders) {
                    return $orders->orderstatus->ordstatname;
                })
                ->editColumn('created_at', function ($orders) {
                    return $orders->getFormattedDateAttribute();
                })
                ->addColumn('orderby', function ($orders) {
                    return $orders->user->userprofile->fullname();
                })
                ->addColumn('checkbox', '<input name="orderid[]" class="orders" type="checkbox" value="{{$orderid}}">')
                ->addColumn('note','<a href="{{route(\'list.orders.delivery.note\', $orderid)}}" target="_blank"  class="btn btn-success btn-xs"><i class="fa fa-print"></i> Delivery Note</a>')
                ->rawColumns(['checkbox','note','orderrefno'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('admin.order.ready', compact('orders'));
    }

    public function Deliveredorders(Request $request){

        $orders = Order::where('orderstatid',1)
                        ->with(['user','orderstatus'])
                        ->orderBy('created_at','DESC')->get();

        if ($request->ajax()) {
            return Datatables::of($orders)

                ->editColumn('orderstatid', function ($orders) {
                    return $orders->orderstatus->ordstatname;
                })
                ->editColumn('created_at', function ($orders) {
                    return $orders->getFormattedDateAttribute();
                })
                ->addColumn('orderby', function ($orders) {
                    return $orders->user->userprofile->fullname();
                })
                ->addColumn('note','<a href="{{route(\'list.orders.delivery.note\', $orderid)}}" target="_blank"  class="btn btn-success btn-xs"><i class="fa fa-print"></i> Delivery Note</a>')
                ->rawColumns(['note'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.order.delivered', compact('orders'));
    }

    public function Deliverynote($orderid){
        $order = Order::with('user.billingaddress')->where('orderid',$orderid)->first();
        $details = $this->delinote($orderid);
        return view('admin.order.deliverinote', compact('details','order'));
    }

    public function Deliverynotepdf($orderid){
        $order = Order::with('user.billingaddress')->where('orderid',$orderid)->first();
        $details = $this->delinote($orderid);
        $pdf = \PDF::loadView('admin.order.deliverynotepdf',compact('details','order'));
        return $pdf->download('Delivernote_'.$order->user->name.'_'.$order->orderrefno.'_'.$order->getFormattedDateAttribute().'.pdf');
    }

    public function Details($id, Request $request){
        $page = ($request->order)?$request->order:null;
        $order = Order::find($id);
        $fullname = $order->user->userprofile->fullname();

        $details = Orderdetail::with('product')->where('orderid',$id)->paginate(15);

        return view('admin.order.partials.orderdetails', compact('details','page','fullname','order'));
    }

    public function updatePending(Request $request){

        $orderid = $request->input('orderid');

        foreach($orderid as $key => $id) {
            Order::where('orderid', $id)->update(['orderstatid'=>3]);
        }

        return response()->json(['success' => true, 'data'   => 'Records have been updated']);

    }

    public function updateProcessed(Request $request){

        $orderid = $request->input('orderid');

        foreach($orderid as $key => $id) {
            Order::where('orderid', $id)->update(['orderstatid'=>4]);
        }

        return response()->json(['success' => true, 'data'   => 'Records have been updated']);

    }

    public function updateDelivered(Request $request){

        $orderid = $request->input('orderid');

        foreach($orderid as $key => $id) {
            Order::where('orderid', $id)->update(['orderstatid'=>1]);
        }

        return response()->json(['success' => true, 'data'   => 'Orders have been Completed']);

    }

    private function valid($rule, $msg){
        return Validator::make($this->request->except('_token'), $rule, $msg);
    }

    private function getAllPending(){
        return Order::where('orderstatid', 2)->paginate(10);
    }

    private function getOrder($orderrefno){
        return Order::with(['orderstatus','user'])
            ->where('orderrefno', $orderrefno)
            ->paginate(10);
    }

    public function Procure(){

        if($this->request->ajax()){

            try {
                $rawstart = $this->request->start;
                $rawend = $this->request->end;

                $procure = $this->procode($rawstart, $rawend);

                return view('admin.order.partials.procure', compact('procure','rawstart','rawend'))->with(['success'=> true]);
            }
            catch (\Exception $e) {

            }
        }

        return view('admin.order.procurelist');
    }

    public function procurePdf(Request $request){
        $rawstart = $this->request->start;
        $rawend = $this->request->end;
        $procure = $this->procode($rawstart, $rawend);

        //view()->share('usere',$usere);

        $pdf = \PDF::loadView('admin.order.procurepdf',compact('procure','rawend', 'rawstart'));
        return $pdf->download('Procument-list.pdf');
    }

    private function procode($rawstart, $rawend){
        $start = new Carbon($rawstart);
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $rawend.'23:59:59');
        return Order::where('ispaid',1)
            ->selectRaw("SUM(orderdetails.quantity) as quantity,orderdetails.productid,products.description,products.productname")
            ->leftJoin('orderdetails','orders.orderid','=','orderdetails.orderid')
            ->leftJoin('products','orderdetails.productid','products.productid')
            ->whereBetween('orders.created_at', [$start,$end])
            ->groupBy('orderdetails.productid')
            ->get();

    }

    private function delinote($orderid){
        return Orderdetail::with('product')
            ->where('orderid',$orderid)
            ->paginate(15);
    }

}
