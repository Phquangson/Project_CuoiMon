<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller{
    public function index(){
        return view('register/index');
    }

    public function save(Request $req){
        $req->merge(['password' => Hash::make($req->password)]);

        try{
            User::create($req->all());
        } catch(\Throwable $th){
            // dd($th);
        }
        return redirect('login/index');
    }
    
}

?>