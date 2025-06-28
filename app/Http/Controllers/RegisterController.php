<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {

        return view('register/index');
    }
    public function save(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255|unique:users,name',
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

        $req->merge(['password' => Hash::make($req->password)]);

        try {
            User::create($req->only(['name', 'email', 'password']));
            return redirect('login/index')->with('success', 'Tạo tài khoản thành công!');
        } catch (\Throwable $th) {
            return redirect('login/index')->with('error', 'Lỗi hệ thống: ' . $th->getMessage());
        }
    }
}
