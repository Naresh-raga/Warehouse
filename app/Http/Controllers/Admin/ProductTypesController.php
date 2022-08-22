<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductTypes;
use Hash;

class ProductTypesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductTypes::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'product-types_edit';
                    $deleteGate = 'product-types_delete';
                    $crudRoutePart = 'product-types';
    
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

        return view('admin.ptypes.index');
    }

    public function create()
    {
        $roles = ProductTypes::where('status',1)->latest()->get();
        return view('admin.ptypes.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'   => 'required',
            'qty'   => 'required',
            'product_type'   => 'required',
            'rate'   => 'required',
            'weight_type'   => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new ProductTypes;
            $page->name = $request->name;
            $page->qty = $request->qty;
            $page->product_type = $request->product_type;
            $page->rate = $request->rate;
            $page->weight_type = $request->weight_type;
            $page->save();
        }
        return redirect()->route('product-types.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = ProductTypes::find($id);
        return view('admin.ptypes.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'name'   => 'required',
            'qty'   => 'required',
            'product_type'   => 'required',
            'rate'   => 'required',
            'weight_type'   => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = ProductTypes::find($id);
            $page->name = $request->name;
            $page->qty = $request->qty;
            $page->product_type = $request->product_type;
            $page->rate = $request->rate;
            $page->weight_type = $request->weight_type;
            $page->save();
        }
        return redirect()->route('product-types.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = ProductTypes::find($id);
        $shark->delete();
        return redirect()->route('product-types.index')->with('success', config('global.delete_msg'));
    }
}