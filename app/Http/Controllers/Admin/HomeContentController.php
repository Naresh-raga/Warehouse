<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\HContent;

class HomeContentController extends Controller
{

    public function edit(Request $request,$id)
    {
        $attribute = HContent::find($id);
       
        return view('admin.hcontent.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = HContent::find($id);
            $page->description = $request->description;
            if($request->hasFile('video')){
                $next = uploadFiles($request,'video');
                $page->video = $next;
            }
            $page->save();
        }
        return back()->with('success', config('global.update_msg'));
    }
}
