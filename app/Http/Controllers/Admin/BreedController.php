<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Breed;

class BreedController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Breed::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'breed_edit';
                    $deleteGate = 'breed_delete';
                    $crudRoutePart = 'breed';
    
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

        return view('admin.breed.index');
    }

    public function create()
    {
        return view('admin.breed.create');
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
            $page =  new Breed;
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('breed.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Breed::find($id);
        return view('admin.breed.edit', compact('attribute'));
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
            $page = Breed::find($id);
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('breed.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Breed::find($id);
        $shark->delete();
        return redirect()->route('breed.index')->with('success', config('global.delete_msg'));
    }
}
