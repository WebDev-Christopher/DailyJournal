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
            'user_id' => 'required',
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
     * edit story
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $id = $request["id"];
        $title = $request["title"];
        $body = $request["body"];

        Stories::where('id', $id)->update([
            'title'=>$title,
            'body'=>$body
        ]);

        return redirect("/");
    }

    /**
     * delete story
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $id = $request["id"];

        Stories::where('id', $id)->delete();
        return redirect("/");
    }
}
