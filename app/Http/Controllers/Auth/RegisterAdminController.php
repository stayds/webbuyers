<?php

namespace App\Http\Controllers\Auth;

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
            'phone' => 'required|numeric|min:8|regex:/^([0-9\s\-\+\(\)]*)$/|unique:admins'
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

        return redirect()->back()->withSuccess('Admin User Successfully created');

    }

}
