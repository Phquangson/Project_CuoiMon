<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginAdminController extends Controller
{
    public function index()
    {
        return view('login_admin/index');
    }

}
