<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{


    public function index()
    {
        $products = Product::where('status',1)
            ->get(['productid','productname','description','price','productimg','prodcatid']);

        return view('home.home',compact('products'));
    }


    public function create()
    {
        //
    }


    public function getAdminLogin(){
        return view('admin.login');
    }

    public function getContact(){
        return view('home.contact');
    }

    public function postContact(Request $request){

//        $validate = $this->validate($request, [
//            'email'   => 'required|string|max:255',
//            'name' => 'required|string|min:3',
//            'msgcontent' => 'required|string|min:3',
//            'subject' => 'required|string|min:3',
//        ]);
        $validate = Validator::make($request->all(), [
           'email'   => 'required|string|max:255',
           'name' => 'required|string|min:3',
           'msgcontent' => 'required|string|min:3',
            'subject' => 'required|string|min:3',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
         }
        $mail = 'contact@bulkbuyersconnect.com';
        //$mail = 'info@bulkbuyersconnect.com';
        \Mail::to($mail)->send(new Contact($request));

        return redirect()->back()->withSuccess('Information Successfully sent');
    }

    public function getAbout(){
        return view('home.about');
    }

    public function getHowitworks(){
        return view('home.howitworks');
    }

    public function getFaq(){
        return view('home.faq');
    }

    public function getPrivacy(){
        return view('home.privacy');
    }

    public function getDelivery(){
        return view('home.deliveryinfo');
    }

    public function getTerms(){
        return view('home.terms');
    }

}
