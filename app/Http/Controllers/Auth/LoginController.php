<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // if(@auth::user()->isAdmin==1){
    //     protected $redirectTo = RouteServiceProvider::CHART;
    // }
    // else
    // {
    //   

    // }

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    
    // protected function redirectTo()
    // {
    
    //     if (@auth::user()->isAdmin==1) {
    //         return $this->redirectTo = '/chart';
    //     }
        
    //     return $this->redirectTo = '/home';
    // }
}
