<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main($value='')
    {
    	return view("home");
    }
    public function signin($value='')
    {
    	return view('signin');
    }
    public function signup($value='')
    {
    	return view('signup');
    }
}
