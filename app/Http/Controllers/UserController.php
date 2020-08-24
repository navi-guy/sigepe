<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\User;
use Illuminate\Http\Request;
use CorporacionPeru\Http\Requests\StoreUserRequest;
use CorporacionPeru\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return back()->with(['alert-type' => 'success', 'status' => 'Usuario creado con exito']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $id = $request->id;
        User::findOrFail($id)->update($request->validated());
        return back()->with(['alert-type' => 'success', 'status' => 'Usuario editado con exito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with(['alert-type' => 'warning', 'status' => 'Usuario eliminado con exito']);
    }
}
