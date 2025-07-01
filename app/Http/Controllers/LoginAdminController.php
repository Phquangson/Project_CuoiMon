<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login_admin/index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/template_admin/dashboard');
        }

        return back()->withErrors(['email' => 'Incorrect email or password.']);
    }

   public function logout()
    {
        Auth::guard('admin')->logout(); 
        return redirect()->route('admin.login'); 
    }

    public function dashboard()
    {
        $adminName = auth('admin')->user()->name;
        return view('template_admin.dashboard', compact('adminName'));
    }
}
