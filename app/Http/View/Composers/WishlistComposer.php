<?php


namespace App\Http\View\Composers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistComposer
{
    public function compose(View $view){

            $user = Auth::user();
            $count = $this->getUserWishcount($user);

            $view->with('wishlist', $count);

    }

    private function getUserWishcount($user){
        return $user->products->count();
    }
}
