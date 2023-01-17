<?php

namespace App\Http\Controllers;

use App\Models\Stories;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Stories::all();
        return view('pages.posts.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $posts = new Stories($request->input());
        $posts->save();
        return redirect("/");
    }

    /**
     * Show post.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Stories::find($id);
        return view('pages.users.index')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function edit(Stories $stories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stories $stories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stories  $stories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stories $stories)
    {
        //
    }
}
