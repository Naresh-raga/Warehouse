<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash,Auth;
use App\Models\User;

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

    //use AuthenticatesUsers;

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
        //$this->middleware('guest')->except('logout');
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('vendor')->withSuccess('Signed in');
        }

        return redirect("login")->withError('Login details are not valid');
    }

    function showRegistrationForm(){
        return view('auth.register'); 
    }

    public function customRegistration(Request $request)
    {  
        $rules = array(
            'name'   => 'required',
            'email'  => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required',
            'mobile'   => 'required',
            //'role_id'   => 'required',
            'address'   => 'required',
            'state'   => 'required',
            'city'   => 'required',
            'pincode'   => 'required|max:6|min:6',
            'pan'   => 'required|max:10|min:10',
            'gst'   => 'required|max:15|min:15',
            'adhar'   => 'required|max:16|min:16'
        );
        $request->validate($rules);
           
        $page =  new User;
        $page->name = $request->name;
        $page->email = $request->email;
        $page->password = Hash::make($request->password);
        $page->mobile = $request->mobile;
        $page->role_id = $request->role_id;
        $page->address = $request->address;
        $page->state = $request->state;
        $page->city = $request->city;
        $page->pincode = $request->pincode;
        $page->pan = $request->pan;
        $page->gst = $request->gst;
        $page->adhar = $request->adhar;
        $page->role_id = 2;
        $page->save();
        Auth::loginUsingId($page->id);
        return redirect("vendor")->withSuccess('You are signed-in successfully');
    }

}
