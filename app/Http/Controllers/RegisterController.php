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
            'name.unique' => 'Name already exists.',
            'email.unique' => 'Email is already in use.',
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter email.',
            'password.required' => 'Please enter password.',
            'password.min' => 'Password must have at least :min characters.',
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
            return redirect()->back()->with('error', 'Registration failed: ' . $th->getMessage());
        }
    }
}
