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
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'Email không tồn tại'])
                ->withInput();
        }

        if (!Hash::check($req->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'Mật khẩu không đúng'])
                ->withInput();
        }

        Auth::login($user);
        return redirect()->intended('home/index');
    }
}
