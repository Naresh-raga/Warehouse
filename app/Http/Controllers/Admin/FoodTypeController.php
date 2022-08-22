<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FoodType;

class FoodTypeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FoodType::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'food-type_edit';
                    $deleteGate = 'food-type_delete';
                    $crudRoutePart = 'food-type';
    
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

        return view('admin.foodtype.index');
    }

    public function create()
    {
        return view('admin.foodtype.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'  => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new FoodType;
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('food-type.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = FoodType::find($id);
        return view('admin.foodtype.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'title'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = FoodType::find($id);
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('food-type.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = FoodType::find($id);
        $shark->delete();
        return redirect()->route('food-type.index')->with('success', config('global.delete_msg'));
    }
}