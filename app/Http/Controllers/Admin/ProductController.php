<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin','backinvalidate']);

    }


    public function index()
    {
        $products = Product::with('productcategory')->paginate(10);
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $category = Productcategory::all();
        return view('admin.product.createform', compact('category'));
    }

    public function store(Request $request)
    {
        $rules = [
            'productname' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'min:8',
            'prodcatid' => 'required',
            'price' => 'required','number',
            'productimg'  => 'required|mimes:jpeg,gif,png,jpg|max:2048'
        ];

        $validatedData = $request->validate($rules);

//        $check = Product::where('productname', $request['productname'])->first();
//
//        if($check){
//            return redirect()->back()->withErrors('Product name already exist');
//        }

        if($validatedData){
            $files = $request->file('productimg');
            $filename = time().''.$files->getClientOriginalName();
            $temp_dir = public_path('products').'/';
            $files->move($temp_dir, $filename);
            $validatedData['productimg'] = 'products/'.$filename;

            $product = new Product();
            $product->prodcatid = $validatedData['prodcatid'];
            $product->productname = $validatedData['productname'];
            $product->description = $validatedData['description'];
            $product->price = $validatedData['price'];
            $product->productimg = $validatedData['productimg'];

            $product->save();

            return redirect()->back()->withSuccess('Product successfully created');
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $detail = Product::find($id);
        $category = Productcategory::all();
        return view('admin.product.editproduct', compact('detail','category'));
    }


    public function update(Request $request, $id)
    {

        if ($request->file('productimg')){
            $files = $request->file('productimg');
            $product = Product::find($request->productid);
            $prodlocation = $product->productimg;
            if(unlink($prodlocation)){

                $filename = time().''.$files->getClientOriginalName();
                $temp_dir = public_path('products').'/';
                $files->move($temp_dir, $filename);
                $productimg = 'products/'.$filename;
                $product->productimg = $productimg;
                $product->save();

                return redirect()->back()->with('successs','Product Image successfully created');
            }

        }

        $rules = [
            'productname' => 'required', 'string', 'max:255',
//          'productimg'  => 'required|mimes:jpeg,png,jpg|max:2048'
//          'status' => 'required',
            'description' => 'required', 'string', 'min:8',
            'prodcatid' => 'required',
            'price' => 'required','number',

        ];

        $validatedData = $request->validate($rules);

//        $check = Product::where('productname', $request['productname'])->first();
//        if($check){
//            return redirect()->back()->withErrors('Product name already exist');
//        }

        if($validatedData) {
//            $files = $request->file('productimg');
//            $filename = time() . '' . $files->getClientOriginalName();
//            $temp_dir = public_path('products') . '/';
//            $files->move($temp_dir, $filename);
//            $validatedData['productimg'] = 'products/' . $filename;

            $product = Product::find($id);

            $product->prodcatid = $validatedData['prodcatid'];
            $product->productname = $validatedData['productname'];
            $product->description = $validatedData['description'];
            $product->price = $validatedData['price'];
//            $product->status = $validatedData['status'];
//            $product->productimg = $validatedData['productimg'];

            $product->save();

            return redirect()->back()->with('success','Product successfully created');
        }
    }



    public function destroy($id)
    {
        $product = Product::find($id);
        $product->status = ($product->status > 0) ? 0 : 1;

        $product->save();

        return redirect()->back()->withSuccess('Product status successfully changed');
    }

    public function getDiscount(){
        $list = Discount::all();
        return view('admin.product.discount',compact('list'));
    }

    public function postDiscount(Request $request){

        $this->validate($request, [
            'code'   => 'required|string|max:255',
            'percent' => 'required|numeric',
            'use' => 'required|numeric',

        ]);

        $discount = new Discount();
        $discount->code = strtoupper($request->code);
        $discount->percent = $request->percent;
        $discount->use = $request->use;

        $discount->save();



        return redirect()->back()->withSuccess('Discount Code Successfully created');
    }

    public function disableDiscount($id){
        $discount = Discount::find($id);
        $discount->status = ($discount->status > 0) ? 0 : 1;

        $discount->save();

        return redirect()->back()->withSuccess('Discount status successfully changed');
    }

}
