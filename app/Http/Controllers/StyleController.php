<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $styles = Style::all();
        return view('admin.style.index')->with('styles', $styles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.style.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $style = new Style; 
        $style->name = $request->style;
        $style->author = Auth::id();
        $style->subscription = $request->subscription;
        $style->slug = Str::slug($request->style);
        $style->content = $request->codearea;
        if ($request->file('photo') !== null) {
            $style->image = $request->file('photo')->store('public/screenshot/');
        }
        $style->save();

        return redirect()->route('admin.style.edit', $style);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        return view('admin.style.show')->withStyle($style);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        return view('admin.style.edit')->withStyle($style);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        $style->name = $request->style;
        $style->subscription = $request->subscription;
        $style->slug = Str::slug($request->style);
        $style->content = $request->codearea;
        if ($request->file('photo') !== null) {
            $style->image = $request->file('photo')->store('public/screenshot/');
        }
        $style->save();

        return redirect()->route('admin.style.edit', $style);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        //
    }


   
}
