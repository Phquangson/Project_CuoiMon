<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    //
    public function WelcomeEmail()
    {
        Mail::to('phquangson2003@gmail.com')->send(new WelcomeMail());
         return 'Email Thành công';
    }
}
