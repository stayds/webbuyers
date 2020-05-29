<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Discountorder;
use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['getAddtocart','getCarlist','removeCart','updateCart']);
    }

    public function index(Request $request)
    {
        $products = Product::where('status',1)->paginate(9);

        if($request->catid){
            $products = Product::where('prodcatid', $request->catid)->paginate(9);
        }

        return view('products.index', compact('products'));

    }

    public function show($productid)
    {
        $productid = Crypt::decrypt($productid);
        $result = Product::find($productid);
        $related = Product::where([
                        ['prodcatid',$result->prodcatid],
                        ['productid','!=',$productid]])->get();
        return view('products.details', compact('result','related'));
    }

    public function productsearch(Request $request){
        $result = null;

        if ($request->prodcatid){
            $prodcatid = $request->prodcatid;
            $result = Product::where('prodcatid', $prodcatid)
                ->where('productname', 'LIKE', "%$request->productname%")->get();
        }

        if (!$request->prodcatid) {
            $result = Product::where('productname', 'LIKE', "%$request->productname%")->get();
        }

        $category = Productcategory::all();
        return view('products.search', compact('result','category'));
    }

    public function getAddtocart(Request $request, $productid){

        $productid = Crypt::decrypt($productid);
        $product = Product::find($productid);
        $oldcart = $request->session()->has('cart')? $request->session()->get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->addItem($product,$productid);

        $request->session()->put('cart', $cart);
        //return response()->json(['message'=>'product added to cart', 'success'=>true], 200);
        return redirect()->back();
    }

    public function getCartlist(Request $request){

        if(!$request->session()->has('cart')){
            $products = null;
            return view('products.viewcart', compact('products'));
        }

        //dd($request->all());


        $oldcart = $request->session()->get('cart');

        $cart = new Cart($oldcart);
        $products = $cart->items;
        $totalprice = $cart->totalPrice;
        $discount = $oldcart->discount;
        $discountid = $oldcart->discountid;
        //dd($cart->items);

        return view('products.viewcart', compact('products','totalprice','discount','discountid'));
    }

    public function removeCart(Request $request, $productid){
        $productid = Crypt::decrypt($productid);
        $product = Product::find($productid);
        $oldcart = $request->session()->get('cart');

        $cart = new Cart($oldcart);

        $cart->removeItem($product, $productid);

        $request->session()->put('cart', $cart);

        return redirect()->back();

    }

    public function updateCart(Request $request){
        //$id = Crypt::decrypt($request->id);
        $id = $request->id;
        $product = Product::find($id);
        $oldcart = $request->session()->get('cart');

        $cart = new Cart($oldcart);
        $cart->updateItem($product,$id, $request->qty);
        $request->session()->put('cart', $cart);


        return response()->json(['success'=>true]);

    }

    public function discount(Request $request){

        $user = $this->getUser();
        $code = strtoupper($request->code);
        $discheck = Discount::where(['code'=> $code, 'status'=> 1])->first();

        if($discheck){

            $disorder = Discountorder::where(['userid'=> $user->userid,'discountid'=>$discheck->id])
                        ->where('used','>=',$discheck->use)
                        ->first();

            if($disorder){
                return response()->json(['error'=>true]);
            }

            $oldcart = $request->session()->get('cart');

            $cart = new Cart($oldcart);

            $cart->discount($discheck->percent, $discheck->id);

            $request->session()->put('cart', $cart);

            return response()->json(['success'=>true]);

        }


    }

    public function discountOut(Request $request){

            $oldcart = $request->session()->get('cart');

            $cart = new Cart($oldcart);

            $cart->removediscount();

            $request->session()->put('cart', $cart);

            return response()->json(['success'=>true]);

    }

    private function getUser(){
        return Auth::user();
    }

}
