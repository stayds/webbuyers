<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Userprofile;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(['admin','backinvalidate']);
    }

    public function index()
    {

        $value = 9;
        $users = Userprofile::with(['user:userid,email,phone,status','state:stateid,statename'])
                              ->orderby('created_at','DESC')->paginate($value);

        if($this->request->ajax()){

            if($this->request->paginate){
                $value = $this->request->paginate;
                $users = Userprofile::with(['user:userid,email,phone,status','state:stateid,statename'])
                    ->orderby('created_at','DESC')->paginate($value);
                return view('admin.customer.custtable',compact('users'));
            }
            elseif($this->request->option =='fname'){
                $users = Userprofile::where('fname','LIKE','%'.$this->request->detail.'%')
                                     ->with(['user:userid,email,phone',
                                    'state:stateid,statename'])
                              ->orderby('created_at','DESC')->paginate($value);
                return view('admin.customer.custtable',compact('users'));
            }
            elseif($this->request->option =='lname'){
                $users = Userprofile::where('lname','LIKE','%'.$this->request->detail.'%')
                                     ->with(['user:userid,email,phone',
                                    'state:stateid,statename'])
                              ->orderby('created_at','DESC')->paginate($value);
                return view('admin.customer.custtable',compact('users'));
            }
            elseif($this->request->option =='phone'){
                $users = User::where('phone',trim($this->request->detail))
                              ->with('userprofile')
                              ->orderby('created_at','DESC')
                              ->paginate($value);


                return view('admin.customer.custtableedit',compact('users'));
            }
            elseif($this->request->option =='email'){
                $users = User::where('email',trim($this->request->detail))
                              ->with('userprofile')
                              ->orderby('created_at','DESC')
                              ->paginate($value);
                return view('admin.customer.custtableedit',compact('users'));
            }
        }

        return view('admin.customer.index',compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = User::find($id);
        $userorders = Order::where('userid', $user->userid)->paginate(10);

        return view('admin.customer.orders',compact('userorders'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function enable($id){
        $user = User::find($id);
        $user->status = 1;

        $user->save();

        return redirect()->back()->withSuccess('Customer Successfully Enabled');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->status = ($user->status > 0) ? 0 : 1;

        $user->save();

        return redirect()->back()->withSuccess('Customer Status Successfully Changed');

    }
}
