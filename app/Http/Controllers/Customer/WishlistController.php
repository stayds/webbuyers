<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlistadder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getindex(Request $request)
    {

//            $category = Productcategory::all();
//             $wish = WishlistComposer::with('products')->where('userid',Auth::user()->userid);
//             dd($wish->products);
////            $user = Auth::user();
////            $wishlist = WishlistComposer::find()
////            //$wishlist = WishlistComposer::with('product')->where("userid", $user->userid)->get();
////            dd($wishlist);

//        if(!$request->session()->has('wishlist')){
//            $products = null;
//            return view('products.viewwishlist', compact('wishlist','category'));
//        }
//
//        $oldcart = $request->session()->get('wishlist');
//        $wish = new Wishlistadder($oldcart);
//        $wishlist = $wish->items;

        $user = Auth::user();
        $wishlist = $user->products()->get();

        return view('products.viewwishlist', compact('wishlist'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function getAddWishlist(Request $request){
        $user = Auth::user();
        $productid = Crypt::decrypt($request->productid);
        $check = $user->products->where('productid',$productid)->first();

        if ($check){
            return redirect()->back()
                             ->with('wisherror',$check->productname.' already exist in Wish List');
        }
//        $getWishlist = $request->session()->get('wishlist');
//        $wish = Product::find($request->productid);
//        $list = $request->session()->has('wishlist')? $getWishlist :null;
//        $wishlist = new Wishlistadder($list);
//        $wishlist->addItem($wish,$request->productid);

//        $request->session()->put('wishlist', $wishlist);

        $user->products()->attach($productid);
        $wishcount = $user->products->count();
        $request->session()->put('wishlist', $wishcount);

        return redirect()->back()
                         ->with('wishlistadded','Record successfully added to Wish List');

    }

    public function destroy(Request $request, $id)
    {
           $id = Crypt::decrypt($id);
           $user = Auth::user();
           $user->products()->detach($id);
           $wishcount = $user->products->count();
           $request->session()->put('wishlist', $wishcount);

            return redirect()->back()
                ->with('wishsuccess',
                    'Item successfully deleted');

    }
}
