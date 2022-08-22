<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\CmsPage;
use Illuminate\Support\Str;

class CmsPageController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CmsPage::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'cms-pages_edit';
                    $deleteGate = 'cms-pages_delete';
                    $crudRoutePart = 'cms-pages';
    
                    return view('admin.partial.dt_actions', compact(
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    ));
                })
                
               
                ->rawColumns(['action'])    
                //->rawColumns(['image'])
                ->make(true);
        }

        return view('admin.cmsPages.index');
    }

    public function create()
    {
        return view('admin.cmsPages.create');
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
            $page =  new CmsPage;
            $page->title = $request->title;
            $page->slug = Str::slug($request->title, '-');
            $page->description = $request->description;
            if($request->hasFile('image')){
                $next = uploadFiles($request,'image');
                $page->image = $next;
            }
            $page->save();
        }
        return redirect()->route('cms-pages.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = CmsPage::find($id);
        $cm = readonlyPages();
        return view('admin.cmsPages.edit', compact('attribute','cm'));
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
            $xp = CmsPage::find($id);
            $page = CmsPage::find($id);
            $page->title = $request->title;
            if($request->title != $xp->title){
                $page->slug = Str::slug($request->title, '-');
            }
            $page->description = $request->description;
            if($request->hasFile('image')){
                $next = uploadFiles($request,'image');
                $page->image = $next;
            }
            $page->save();
        }
        return redirect()->route('cms-pages.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = CmsPage::find($id);
        // if(file_exists(storage_path('app/public/'.$shark->image))){
        //     unlink(storage_path('app/public/'.$shark->image));
        // }
        $shark->delete();
        return redirect()->route('cms-pages.index')->with('success', config('global.delete_msg'));
    }
}
