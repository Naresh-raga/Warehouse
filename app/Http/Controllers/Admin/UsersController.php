<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Roles;
use Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'users_edit';
                    $deleteGate = 'users_delete';
                    $crudRoutePart = 'users';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Roles::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'   => 'required',
            'email'  => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required',
            'mobile'   => 'required',
            'role_id'   => 'required',
            'address'   => 'required',
            'state'   => 'required',
            'city'   => 'required',
            'pincode'   => 'required|max:6|min:6',
            'pan'   => 'required|max:10|min:10',
            'gst'   => 'required|max:15|min:15',
            'adhar'   => 'required|max:16|min:16'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
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
            $page->save();
        }
        return redirect()->route('users.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = User::find($id);
        $roles = Roles::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.users.edit', compact('attribute','roles'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'name'   => 'required',
            'email'  => 'required|unique:users,email,' . $id.',id,deleted_at,NULL',
            'mobile'   => 'required',
            'role_id'   => 'required',
            'address'   => 'required',
            'state'   => 'required',
            'city'   => 'required',
            'pincode'   => 'required|max:6|min:6',
            'pan'   => 'required|max:10|min:10',
            'gst'   => 'required|max:15|min:15',
            'adhar'   => 'required|max:16|min:16'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = User::find($id);
            $page->name = $request->name;
            $page->email = $request->email;
            //$page->password = Hash::make($request->password);
            $page->mobile = $request->mobile;
            $page->role_id = $request->role_id;
            $page->address = $request->address;
            $page->state = $request->state;
            $page->city = $request->city;
            $page->pincode = $request->pincode;
            $page->pan = $request->pan;
            $page->gst = $request->gst;
            $page->adhar = $request->adhar;
            $page->save();
        }
        return redirect()->route('users.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = User::find($id);
        $shark->delete();
        return redirect()->route('users.index')->with('success', config('global.delete_msg'));
    }
}