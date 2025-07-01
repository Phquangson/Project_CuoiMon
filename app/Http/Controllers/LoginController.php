<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {

        return view('login/index');
    }

    public function postlogin(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Please enter email.',
            'email.email' => 'Email is not in correct format.',
            'password.required' => 'Please enter password.',
            'password.min' => 'Password must have at least :min characters.',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email does not exist'])->withInput();
        }

        if (!Hash::check($req->password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect'])->withInput();
        }

        if (!$user->hasVerifiedEmail()) {
            return back()->with('need_verify', true)->withInput();
        }

        Auth::login($user);
        return redirect()->intended('/home/index');
    }
}
