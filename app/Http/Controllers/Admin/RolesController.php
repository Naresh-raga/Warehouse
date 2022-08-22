<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Roles::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'roles_edit';
                    //$deleteGate = 'roles_delete';
                    $crudRoutePart = 'roles';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.role.index');
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'  => 'required|unique:role,name,NULL,id,deleted_at,NULL',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new Roles;
            $page->name = $request->name;
            $page->save();
        }
        return redirect()->route('roles.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Roles::find($id);
        return view('admin.role.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'name'  => 'required|unique:role,name,' . $id.',id,deleted_at,NULL'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = Roles::find($id);
            $page->name = $request->name;
            $page->save();
        }
        return redirect()->route('roles.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Roles::find($id);
        $shark->delete();
        return redirect()->route('roles.index')->with('success', config('global.delete_msg'));
    }
}