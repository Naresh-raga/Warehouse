<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\Permissionx;
use App\Models\Roles;

class PermissionController extends Controller
{

    public function edit(Request $request,$id)
    {
        $attribute = Permissionx::get();
       
        $roles = Roles::with('perms')->where('status',1)->where('id','>',1)->whereNull('deleted_at')->get();
        return view('admin.permission.edit', compact('attribute','roles'));
    }

    public function update(Request $request,$id)
    {
        Permissionx::truncate();
        $all = $request->all();
        foreach($all['role_id'] as $k=>$f){
            $page =  new Permissionx;
            $page->role_id =  $f;
            $page->add =  (isset($all['add'][$k]))?1:0;
            $page->edit =  (isset($all['edit'][$k]))?1:0;
            $page->delete =  (isset($all['delete'][$k]))?1:0;
            $page->view =  (isset($all['view'][$k]))?1:0;
            $page->save();
        }
        return back()->with('success', config('global.update_msg'));
    }
}
