<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function login() {
        return view('login');
    }

    public function check_login(Request $request) {
        $admin = Admin::where(['username' => $request->username, 'password' => sha1($request->password)])->count();

        if($admin > 0) {
            $adminData = Admin::where(['username' => $request->username, 'password' => sha1($request->password)])->get();
            session(['adminData' => $adminData]);

            if($request->has('remember_me')) {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }
            return redirect('admin');

        } else {
            return redirect('/')->with('msg', 'Invalid username / password');
        }
    }

    public function logout() {
        session()->forget(['adminData']);
        return redirect('/');
    }
}
