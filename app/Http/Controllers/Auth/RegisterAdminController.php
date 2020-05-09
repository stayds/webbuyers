<?php

namespace App\Http\Controllers\Auth;

use App\Mail\AdminRegister;
use App\Mail\Registration;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{

    public function postCreateAdmin(Request $request){

        $this->validate($request, [
            'email'   => 'required|string|max:255|email|unique:admins',
            'fname' => 'required|string|min:3',
            'lname' => 'required|string|min:3',
            'role' => 'required',
            'phone' => 'required|size:11|regex:/(0)[0-9]/|not_regex:/[a-z]/|unique:admins'
        ]);

        //$admin = new Admin();

        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('password1'),
        ];

        $admin = Admin::create($data);

        $adminrole = new Admin_role();
        $adminrole->adminid = $admin->id;
        $adminrole->roleid = $request->role;

        $adminrole->save();

        \Mail::to($admin->email)->send(new AdminRegister($admin));

        return redirect()->back()->withSuccess('Admin User Successfully created');

    }

}
