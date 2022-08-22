<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash,Auth;
  
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
    }
 
    public function login(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('admin.home');
            }else if (auth()->user()->role_id == 2) {
                return redirect()->route('manager.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        }
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
        $page->company_name = $request->company_name;
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
        return redirect()->route('manager.home')->withSuccess('You are signed-in successfully');
    }
}