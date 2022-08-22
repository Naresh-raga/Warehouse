<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Allergy;

class AllergyController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Allergy::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'allergy_edit';
                    $deleteGate = 'allergy_delete';
                    $crudRoutePart = 'allergy';
    
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

        return view('admin.allergy.index');
    }

    public function create()
    {
        return view('admin.allergy.create');
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
            $page =  new Allergy;
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('allergy.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Allergy::find($id);
        return view('admin.allergy.edit', compact('attribute'));
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
            $page = Allergy::find($id);
            $page->title = $request->title;
            $page->save();
        }
        return redirect()->route('allergy.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Allergy::find($id);
        $shark->delete();
        return redirect()->route('allergy.index')->with('success', config('global.delete_msg'));
    }
}