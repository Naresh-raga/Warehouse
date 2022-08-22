<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'category_edit';
                    $deleteGate = 'category_delete';
                    $crudRoutePart = 'category';
    
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

        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
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
            $page =  new Category;
            $page->name = $request->name;
            $page->save();
        }
        return redirect()->route('category.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Category::find($id);
        return view('admin.category.edit', compact('attribute'));
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
            $page = Category::find($id);
            $page->name = $request->name;
            $page->save();
        }
        return redirect()->route('category.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Category::find($id);
        $shark->delete();
        return redirect()->route('category.index')->with('success', config('global.delete_msg'));
    }
}