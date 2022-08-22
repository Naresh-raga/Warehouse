<?php
namespace App\Http\Controllers\Admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailTemplates;
use Illuminate\Support\Str;
use Image,DB;

class EmailTemplatesController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EmailTemplates::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editGate = 'etemplate_edit';
                    $deleteGate = 'etemplate_delete';
                    $crudRoutePart = 'etemplate';
    
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

        return view('admin.etemplate.index');
    }

    public function create()
    {
        return view('admin.etemplate.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'title'       => 'required',
            'subject'      => 'required',
            'sender_email' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page =  new EmailTemplates;
            $page->title = $request->title;
            $page->subject = $request->subject;
            $page->sender_email = $request->sender_email;
            $page->description = $request->description;
            
            $page->save();
        }
        return redirect()->route('etemplate.index')->with('success', config('global.save_msg'));
    }

    public function edit(Request $request,$id)
    {
        $attribute = EmailTemplates::find($id);
        return view('admin.etemplate.edit', compact('attribute'));
    }

    public function update(Request $request,$id)
    {
        $rules = array(
            'title'       => 'required',
            'subject'      => 'required',
            'sender_email' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $page = EmailTemplates::find($id);
            $page->title = $request->title;
            $page->subject = $request->subject;
            $page->sender_email = $request->sender_email;
            $page->description = $request->description;
            $page->save();
        }
        return redirect()->route('etemplate.index')->with('success', config('global.update_msg'));
    }

    public function destroy($id)
    {
        $shark = EmailTemplates::find($id);
        $shark->delete();
        return redirect()->route('etemplate.index')->with('success', config('global.delete_msg'));
    }

}
