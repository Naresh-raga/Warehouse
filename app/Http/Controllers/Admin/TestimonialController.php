<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\Testimonial;

class TestimonialController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'testimonial_edit';
                    $deleteGate = 'testimonial_delete';
                    $crudRoutePart = 'testimonial';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                
                ->editColumn('author_image', function($row) {
                    return ($row->author_image!="")?'<img style="width:70px;height:50px" src="'.url('storage/'.$row->author_image).'">':'<img src="'.url('storage/media/no_image.jpg').'" style="width:70px;height:50px" >';
                })
                ->rawColumns(['action','author_image'])    
                //->rawColumns(['image'])
                ->make(true);
        }

        return view('admin.testimonial.index');
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'       => 'required',
            'author'      => 'required',
            'description' => 'required',
            'author_image' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new Testimonial;
            $page->title = $request->title;
            $page->author = $request->author;
            $page->description = $request->description;
            if($request->hasFile('author_image')){
                $next = uploadFiles($request,'author_image');
                $page->author_image = $next;
            }
            $page->save();
        }
        return redirect()->route('testimonial.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'title'       => 'required',
            'author'      => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = Testimonial::find($id);
            $page->title = $request->title;
            $page->author = $request->author;
            $page->description = $request->description;
            if($request->hasFile('author_image')){
                $next = uploadFiles($request,'author_image');
                $page->author_image = $next;
            }
            $page->save();
        }
        return redirect()->route('testimonial.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Testimonial::find($id);
        if(file_exists(storage_path('app/public/'.$shark->author_image))){
            unlink(storage_path('app/public/'.$shark->author_image));
        }
        $shark->delete();
        return redirect()->route('testimonial.index')->with('success', config('global.delete_msg'));
    }
}
