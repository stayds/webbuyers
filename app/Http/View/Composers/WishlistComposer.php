<?php


namespace App\Http\View\Composers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistComposer
{
    public function compose(View $view){

            $user = Auth::user();
            $count = $this->getUserWishcount($user);
            dd('hello');
            request()->session()->put('wishlist', $count->count());
            dd(request()->session()->get('wishlist'));
            //$view->with('wishlist', $count);

    }

    private function getUserWishcount($user){
        return $user->products->count();
    }
}
