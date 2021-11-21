<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
         //Session::put('backUrl', URL::previous());
    }

    public function redirectTo($value='')
    {
        $roles=auth()->user()->getRoleNames();
        
        //dd($roles);
        
        if($roles[0]=='admin')
        {
            return route('categories.index');
        }
       
        elseif($roles[0]=='staff')
        {
            return route('mainpage');
            //dd(Session::get('backUrl'));
            //return Redirect::intended('defaultpage')
            //return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
        }
    }
}
