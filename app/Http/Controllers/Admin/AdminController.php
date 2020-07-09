<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin_role;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(['admin','backinvalidate']);

    }


    public function index()
    {
        $list = Admin::with('adminrole.role')->paginate(5);
        $role = Role::where('status',true)->get();
        return view('admin.user.list',compact('list','role'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }


    public function showProfile()
    {
        $admin = $this->adminobj();
        $user = Admin::find($admin->id);

        return view('admin.user.profile',compact('user'));
    }


    public function edit($id)
    {

    }


    public function update()
    {

        $this->validate($this->request, [
            'fname' => 'required|min:6',
            'lname' => 'required|min:6',
            'address' => 'required|min:6',
            'phone' => 'required|min:6|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|unique:admins'
        ]);

        $user = $this->adminobj();
        $admin = Admin::find($user->id);

        $admin->fname = $this->request->fname;
        $admin->lname = $this->request->lname;
        $admin->address = $this->request->address;
        $admin->phone = $this->request->phone;

        $admin->save();

        return redirect()->back()->withSuccess('Admin profile was Successfully updated');
    }


    public function destroy($id)
    {
        $admin = Admin::find($id);

        $admin->status = ($admin->status > 0) ? 0 : 1;

        $admin->save();

        return redirect()->back()->withSuccess('Admin User status successfully changed');
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);

        $admin->adminrole()->delete();

        $admin->delete();

        return redirect()->back()->withSuccess('Admin User successfully deleted');
    }



    public function getChangePassword()
    {
        return view('admin.user.changepassword');

    }

    public function postChangePassword(){

        $this->validate($this->request, [
            'password' => 'required|min:6|confirmed'
        ]);
        $user = $this->adminobj();
        $admin = Admin::find($user->id);

        $admin->password = Hash::make($this->request->password);

        $admin->save();

        return redirect()->back()->withSuccess('User password has been updated');
    }

    private function adminobj(){
        return Auth::guard('admin')->user();
    }

}
