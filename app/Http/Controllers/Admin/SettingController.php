<?php

namespace App\Http\Controllers\Admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use App\Models\Setting;

class SettingController extends Controller
{

    public function edit(Request $request,$id)
    {
        $attribute = Setting::find($id);
        return view('admin.setting.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'email' => 'required',
            'mobile' => 'required',
            'whatsapp_number' => 'required',
            'address' => 'required',
            'fb_link' => 'required',
            'google_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = Setting::find($id);
            
            $page->email = $request->email;
            $page->mobile = $request->mobile;
            $page->whatsapp_number = $request->whatsapp_number;
            $page->address = $request->address;
            $page->fb_link = $request->fb_link;
            $page->google_link = $request->google_link;
            $page->instagram_link = $request->instagram_link;
            $page->twitter_link = $request->twitter_link;
            
            $page->save();
        }
        return back()->with('success', config('global.update_msg'));
    }
}
