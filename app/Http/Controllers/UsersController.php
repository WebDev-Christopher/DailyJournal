<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.users.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function authenticate(Request $request)
    {
        $user_data = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        if(auth()->attempt($user_data)) {
            $request->session()->regenerate();
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user_data["password"] = password_hash($user_data["password"], PASSWORD_DEFAULT);

        if(auth()->login(users::create($user_data))) {
            $request->session()->regenerate();
            return redirect('/');
        }
    }

    /**
     * Show user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = users::find($id);
        return view('pages.users.index')->with(compact('user'));
    }

    /**
     * Show the form for updating a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = users::find($id);
        return view('pages.users.settings')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $id = $request["id"];
        $name = $request["name"];
        $email = $request["email"];
        $password = $request["password"]; 

        users::where('id', $id)->update([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $id = $request["id"];
        users::where('id', $id)->delete();
        return redirect('/');
    }
}
