<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register/index');
    }

    public function save(Request $req)
    {
        $req->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:users,name',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.unique' => 'Tên đã tồn tại.',
            'email.unique' => 'Email đã được sử dụng.',
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        ]);

        $name = strtolower($req->name);
        $email = strtolower($req->email);
        $password = Hash::make($req->password);

        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            $user->sendEmailVerificationNotification();
            return redirect()->back()->with('success_verify', true);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Đăng ký thất bại: ' . $th->getMessage());
        }
    }
}
