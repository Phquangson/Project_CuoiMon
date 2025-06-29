<?php

namespace App\Http\Controllers;

class TemplateController extends Controller
{
    public function dashboard()
    {
        return view('template_admin/dashboard');
    }

    public function icon()
    {
        return view('template_admin/icon');
    }

    public function maps()
    {
        return view('template_admin/maps');
    }
        
    public function notifications()
    {
        return view('template_admin/notifications');
    }

    public function user_people()
    {
        return view('template_admin/user_people');
    }

    public function table_list()
    {
        return view('template_admin/table_list');
    }

    public function typography()
    {
        return view('template_admin/typography');
    }

    public function upgrade()
    {
        return view('template_admin/upgrade');
    }



}
