<?php

namespace App\Providers;

use App\Http\View\Composers\WishlistComposer;
use App\Mail\EmailVerify;
use App\Models\Productcategory;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['customer.*','partials.searchform','partials.mainnav','products.categoryfilter'], function ($view){
            $view->with('category', Productcategory::all());
        });

        if (Auth::check()){
            View::composer(['customer.*','products.*','partials*','home.home','layouts.master','partials.topmenu','partials.searchheader'], "App\Http\View\Composers\WishlistComposer");

        }




    }
}
