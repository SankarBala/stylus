<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Style;

class AdminController extends Controller
{
    public function __construct(){
        //
    }

    public function index(){
        View::share('users', User::where('id','!=',1)->get());
        View::share('styles', Style::all());
        return view('admin.index');
    }

    public function users(){
        View::share('users', User::where('id','!=',1)-> paginate());
        return view('admin.user.index');
    }
}
