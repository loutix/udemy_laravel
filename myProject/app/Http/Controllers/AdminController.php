<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Loader\Loader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('isAdmin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$currentUser = Auth::user();
      $currentUser = User::with('roles')->find(Auth::id());
      foreach( $currentUser->roles as $role) {
        dd($role->name);
      }


    //   foreach (collect($currentUser)->roles as $role) {
    //        dd($role->name);
    //    }



       if(Auth::check()) {
           $check = '!!!! is loggin !!!';
       }
        return view('home', compact('user', 'check'));





        // $users = User::with('roles')->get();

        // foreach ($users as $user) {
        //     foreach($user->roles as $role){
        //         dd($role->name);
        //     };
        // }
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
