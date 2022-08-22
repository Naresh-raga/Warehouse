<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HContent;
use App\Models\Testimonial;
use App\Models\CmsPage;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use App\Models\Breed;
use App\Models\FoodType;
use App\Models\Allergy;
use App\Models\MealPlans;
use Mail;
use App\Mail\BuildABoxMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function contact(){
        $s = Setting::first();
        return view('contact',compact('s'));
    }

    function partialContent(Request $request){
        $pets = $request->pet_name;
        $breed =  Breed::latest()->get();
        $ft = FoodType::latest()->get();
        $allergy =Allergy::latest()->get();
        //$count  = $request->count;
        //$returnHTML = view('bab_partial',compact('breed','pets','ft','allergy'))->render();
        $returnHTML = view('bab_partial_new',compact('breed','pets','ft','allergy'))->render();
        return response()->json(array('html'=>$returnHTML));
    }


    function storeAndMail(Request $request){
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $s = Setting::first();
            $emalto = $s->email;
            $a = array();
            $a['all'] = $request->all();
            Mail::send('emails.contactus',$a, function ($message) use ($emalto) {
            $message->from($emalto, 'Nutritious DOG');
            $message->to('hemantsutharcodexo@gmail.com')->subject('Contact Us');
            });
            return back()->with('success','Thanks for contacting us! We will contact you soon regarding your query');
        }
    }

    function biuldABox(Request $request){
        if ($request->isMethod('post')) {
            $mailData = $request->all();
            $mailData['address'] = Setting::first();
            Mail::to('nutritiousdog@gmail.com')->send(new BuildABoxMail($mailData));
            return back()->with('success','Thanks for eaching out! We will contact you soon regarding request');
        }
        $plans =  MealPlans::latest()->get();
        return view('build_a_box',compact('plans'));
        //return view('emails.buildabox',compact('plans'));
    }

    function whyTnd(){
        return view('whytnd');
    }

    function ourIngredients(){
        return view('ingredients');
    }

    function ourStory(){
        return view('ourstory');
    }

    function ourfood(){
        return view('ourfood');
    }


    function faq(){
        return view('faq');
    }

    function tc(){
        return view('tc');
    }
    function rp(){
        return view('rp');
    }

    function pp(){
        return view('pp');
    }

    function sd(){
        return view('sd');
    }

}
