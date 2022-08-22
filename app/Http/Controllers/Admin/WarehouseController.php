<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Warehouse;
use App\Models\User;
use App\Models\Category;
use Hash;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Warehouse::with(['owner','category'])->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'warehouse_edit';
                    $deleteGate = 'warehouse_delete';
                    $crudRoutePart = 'warehouse';
    
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

        return view('admin.warehouse.index');
    }

    public function create()
    {
        $roles = User::where('role_id',2)->latest()->get();
        $cats = Category::where('status',1)->latest()->get();
        return view('admin.warehouse.create',compact('roles','cats'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'=> 'required',
            'owner'=> 'required',
            'category'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'pincode'=> 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new Warehouse;
            $page->name = $request->name;
            $page->owner = $request->owner;
            $page->category = $request->category;
            $page->address = $request->address;
            $page->phone = $request->phone;
            $page->state = $request->state;
            $page->city = $request->city;
            $page->pincode = $request->pincode;
            $page->save();
        }
        return redirect()->route('warehouse.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Warehouse::find($id);
        $roles = User::where('role_id',2)->latest()->get();
        $cats = Category::where('status',1)->latest()->get();
        return view('admin.warehouse.edit', compact('attribute','roles','cats'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'name'=> 'required',
            'owner'=> 'required',
            'category'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'pincode'=> 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = Warehouse::find($id);
            $page->name = $request->name;
            $page->owner = $request->owner;
            $page->category = $request->category;
            $page->address = $request->address;
            $page->phone = $request->phone;
            $page->state = $request->state;
            $page->city = $request->city;
            $page->pincode = $request->pincode;
            $page->save();
        }
        return redirect()->route('warehouse.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Warehouse::find($id);
        $shark->delete();
        return redirect()->route('warehouse.index')->with('success', config('global.delete_msg'));
    }
}