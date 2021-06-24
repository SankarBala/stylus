<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Query;
use App\Models\Style;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        View::share(['styles' => Style::paginate(3)]);
        return view('frontend.styles');
    }

    public function styles()
    {
        View::share(['styles' => Style::paginate(3)]);
        return view('frontend.styles');
    }

    public function styleDetails(Style $style)
    {

        View::share(['style' => $style, 'suggestion' => Style::latest()->take(8)->where('id', '!=', $style->id)->get()]);
        return view('frontend.details');
    }


    public function premium()
    {
        View::share(['styles' => Style::where('subscription', 'premium')->paginate(3)]);
        return view('frontend.styles');
    }

    public function free()
    {
        View::share(['styles' => Style::where('subscription', 'free')->paginate(3)]);
        return view('frontend.styles');
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

    public function styleDownload(Request $request, Style $style)
    {

        $style->downloads++;
        $style->save();

        $response = Response::make($style->content);
        $response->header('Content-Type', 'text/css');
        return $response;

        // return redirect()->back();
    }
}
