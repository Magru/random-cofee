<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();


        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {

        $community = Community::all();

        return view('users.create', [
            'communities' => $community
        ]);
    }


    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->get('name');
        $user->email = null;
        $user->password = null;
        $user->save();

        $community = Community::find($request->get('community'));
        $user->communities()->attach($community);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        redirect()->route('user.index');
    }
}
