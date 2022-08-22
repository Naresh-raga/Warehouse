<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash,Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function showChangePasswordGet() {
        return view('admin.auth.change-password');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    function profile(){
        $user = User::find(Auth::user()->id);
        return view('admin.users.manage-profile',compact('user'));
    }

    function updateProfile(Request $request){
        $rules = array(
            'name'   => 'required',
            //'email'  => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            //'password' => 'required',
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
           
        $page =  User::find(Auth::user()->id);
        $page->name = $request->name;
        $page->company_name = $request->company_name;
        //$page->email = $request->email;
        //$page->password = Hash::make($request->password);
        $page->mobile = $request->mobile;
        //$page->role_id = $request->role_id;
        $page->address = $request->address;
        $page->state = $request->state;
        $page->city = $request->city;
        $page->pincode = $request->pincode;
        $page->pan = $request->pan;
        $page->gst = $request->gst;
        $page->adhar = $request->adhar;
        //$page->role_id = 2;
        $page->save();
        return redirect()->back()->with("success","Profile updated successfully!");
    }

}