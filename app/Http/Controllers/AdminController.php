<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    //

    public function index(){
        $is = Admin::where('type', 0)->first();
        if(!$is){
            Admin::create([
                'email'     => 'admin@email.com',
                'password'  => 'password',
                'type'      => '0'
            ]);
        }

        return view('Admin.Auth.index');
    }

    public function onAdminSignin(Request $request){
        $is= Admin::where('email', $request->email)
                    ->where('password', $request->password)
                    ->where('type', '0')
                    ->first();
        if($is) return "Success";
        else    return "Fail";
    }

    public function onAdminSignup(Request $request){
        $valid = $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);


        Admin::create([
            'email'         => $valid['email'],
            'password'      => $valid['password'],
            'type'          => '1',
        ]);

        return redirect()->route('toAdminList');

    }

    public function toAdminList(){
        $nav = 'AdminList';
        return view('Admin.AdminList.index',[
                'nav'   => $nav,
        ]);
    }

    public function onGetAdminList(Request $request){
        return Admin::orderBy('type')->get();
    }


    public function onGetUserList(Request $request){
        return User::orderBy('created_at', 'DESC')->get();
    }

    public function toUserList(){
        $nav = 'UserList';
        return view('Admin.UserList.index',[
                'nav' => $nav,
        ]);
    }

    public function toUploadImage(){
        $nav = 'upload';
        return view('Admin.Product.index',[
                'nav'       => $nav
        ]);
    }


}
