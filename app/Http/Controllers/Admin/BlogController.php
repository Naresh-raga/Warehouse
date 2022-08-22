<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\Blog;
use Illuminate\Support\Str;
use Image,DB;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'blog_edit';
                    $deleteGate = 'blog_delete';
                    $crudRoutePart = 'blog';
                    $statusGate = 'blog';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'deleteGate',
                        'statusGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                
                ->editColumn('image', function($row) {
                    return '<img style="width:100%;height:80px" src="'.asset($row->thumbnail).'">';
                })

                ->rawColumns(['action','image'])
                ->make(true);
        }

        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'       => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new Blog;
            $page->title = $request->title;
            $page->slug = Str::slug($request->title, '-');
            $page->description = $request->description;
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $directory = checkDirectory();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $thumbImageName = 'thumb_'.uniqid().time().'.'.$extension;
                    $imagePath = $directory.$thumbImageName;
                    if(Image::make($image_tmp)->resize(500,500)->save($imagePath)){
                        $page->thumbnail = date("/Y/m/").$thumbImageName;
                    }
                    $ImageName = 'main_'.uniqid().time().'.'.$extension;
                    $imagePath = $directory.$ImageName;

                    if(Image::make($image_tmp)->resize(1200,600)->save($imagePath)){
                        $page->image = date("/Y/m/").$ImageName;
                    }
                }
            }
            $page->save();
        }
        return redirect()->route('blog.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = Blog::find($id);
        return view('admin.blog.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'title'       => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $xp = Blog::find($id);
            $page = Blog::find($id);
            $page->title = $request->title;
            if($request->title != $xp->title){
                $page->slug = Str::slug($request->title, '-');
            }
            $page->description = $request->description;
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $directory = checkDirectory();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $thumbImageName = 'thumb_'.uniqid().time().'.'.$extension;
                    $imagePath = $directory.$thumbImageName;
                    if(Image::make($image_tmp)->resize(500,500)->save($imagePath)){
                        if($id>0){
                            deleteFile(array(public_path($xp->thumbnail)));
                        }
                        $page->thumbnail = date("/Y/m/").$thumbImageName;
                    }

                    $ImageName = 'main_'.uniqid().time().'.'.$extension;
                    $imagePath = $directory.$ImageName;
                    if(Image::make($image_tmp)->resize(1200,600)->save($imagePath)){
                        if($id>0){
                            deleteFile(array(public_path($xp->image)));
                        }
                        $page->image = date("/Y/m/").$ImageName;
                    }
                }
            }
            $page->save();
        }
        return redirect()->route('blog.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = Blog::find($id);
        deleteFile(array(public_path($shark->image),public_path($shark->thumbnail)));
        $shark->delete();
        return redirect()->route('blog.index')->with('success', config('global.delete_msg'));
    }

    function changeStatus(Request $request){
        $r = $request->all();
        $cus = DB::table($r['model'])->where('id',$r['id'])->first();
        if($cus){
            $new = ($cus->status == 1)?0:1;
            DB::table($r['model'])->where('id',$r['id'])->update(['status'=>$new]);
        }
    }
}
