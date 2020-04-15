<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->getAuthUser();
        $wishlist = $user->products()->get();

        if($wishlist->count() > 0){
            return response()->json($wishlist, 200);
        }

        return response()->json('no wishlist record exist', 401);

    }

    private function getAuthUser(){
        return auth()->user();
    }


    /**
     add to wishlist from mobile
     */
    public function store(Request $request)
    {
        $user = $this->getAuthUser();

        $check = $user->products->where('productid',$request->productid)->first();

        if ($check){
            return response()->json($check->productname.' already exist in Wish List', 203);
        }

        $user->products()->attach($request->productid);

        return response()->json('Product has been added to wishlist', 200);

    }


    /**
     * Remove from wish list
     */
    public function destroy($productid)
    {
        $user = $this->getAuthUser();
        $user->products()->detach($productid);
        return response()->json('Product has been removed from wishlist', 200);
    }
}
