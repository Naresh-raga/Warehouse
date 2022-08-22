<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MealPlans;

class MealPlansController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MealPlans::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'meal-plans_edit';
                    $deleteGate = 'meal-plans_delete';
                    $crudRoutePart = 'meal-plans';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                ->editColumn('image', function($row) {
                    return ($row->image!="")?'<img style="width:65px;height:60px" src="'.url('storage/'.$row->image).'">':'<img src="'.url('storage/media/no_image.jpg').'" style="width:70px;height:50px" >';
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }

        return view('admin.mealplans.index');
    }

    public function create()
    {
        return view('admin.mealplans.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'  => 'required',
            'description'=>'required',
            'qty_per_day'=>'required',
            'price'=>'required',
            'image'=>'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new MealPlans;
            $page->title = $request->title;
            $page->description = $request->description;
            $page->qty_per_day = $request->qty_per_day;
            $page->price = $request->price;
            if($request->hasFile('image')){
                $next = uploadFiles($request,'image');
                $page->image = $next;
            }
            $page->save();
        }
        return redirect()->route('meal-plans.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = MealPlans::find($id);
        return view('admin.mealplans.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'title'  => 'required',
            'description'=>'required',
            'qty_per_day'=>'required',
            'price'=>'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = MealPlans::find($id);
            $page->title = $request->title;
            $page->description = $request->description;
            $page->qty_per_day = $request->qty_per_day;
            $page->price = $request->price;
            if($request->hasFile('image')){
                $next = uploadFiles($request,'image');
                $page->image = $next;
            }
            $page->save();
        }
        return redirect()->route('meal-plans.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = MealPlans::find($id);
        if(file_exists(storage_path('app/public/'.$shark->image))){
            unlink(storage_path('app/public/'.$shark->image));
        }
        $shark->delete();
        return redirect()->route('meal-plans.index')->with('success', config('global.delete_msg'));
    }
}