<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = new User;

        $inputs = [
            'name'    => $request['name'],
            'email'    => $request['email'],
            'password'    => $request['password'],
        ];

        $rules = [
            'name' => 'required',
            'email'   =>  'required|email|unique:'.User::getTableName(),
            'password'   =>  'required|min:6',
        ];

        $validation = \Validator::make( $inputs, $rules );

        if ( $validation->fails() ) {
            return redirect()->back()->withErrors($validation);
        }

      $user->name = $request['name'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['password']);
      $user->save();

      if(!$user->save()){
        return redirect('/register');
      }else{
        return redirect('/login');
      }


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
        //
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
        //
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
