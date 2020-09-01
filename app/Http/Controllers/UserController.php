<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\User;
use Illuminate\Http\Request;
use CorporacionPeru\Http\Requests\StoreUserRequest;
use CorporacionPeru\Http\Requests\UpdateUserRequest;
use CorporacionPeru\Notification;

class UserController extends Controller
{
    const USER_INDEX = 'UserController@index';
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
        Notification::setAlertSession(Notification::SUCCESS,'Usuario creado con exito');
        return redirect()->action(self::USER_INDEX);
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
        Notification::setAlertSession(Notification::SUCCESS,'Usuario editado con exito');
        return redirect()->action(self::USER_INDEX);
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
        Notification::setAlertSession(Notification::WARNING,'Usuario eliminado con exito');
        return redirect()->action(self::USER_INDEX);
    }
}
