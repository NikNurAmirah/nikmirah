<?php

namespace App\Http\Controllers;
use Gate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('see_all_users')){

            $users = User::all();

            return view('admin/users/index', ['users' => $users]);
        }
        return view('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the user
        $user = User::where('id',$id)->first();
        $roles = Role::all();

        // if user does not exist return to list
        if(!$user)
        {
            return redirect('/admin/users');
            // you could add on here the flash messaging of article does not exist.
        }
        if (Gate::allows('see_all_users')) {
            return view('admin/users/edit')->with('user', $user)->with('roles', $roles);
        }
        return view('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = $request->get('role');

        $user->roles()->sync($roles);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
