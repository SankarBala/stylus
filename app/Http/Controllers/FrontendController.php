<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Query;

class FrontendController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('frontend.index');
    }

    public function styles()
    {
        return view('frontend.index');
    }

    public function styleDetails()
    {
        return view('frontend.details');
    }


    public function premium()
    {
        return view('frontend.index');
    }

    public function free()
    {
        return view('frontend.index');
    }

    public function search()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function query(Request $request)
    {
        $query = new Query;
        $query->name = $request->name;
        $query->email = $request->email;
        $query->subject = $request->subject;
        $query->message = $request->message;
        $query->save();

        Session::flash('message', 'Your query has been received. You will be notified soon.');

        return back();
    }
}
