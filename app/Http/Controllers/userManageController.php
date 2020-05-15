<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class userManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users=User::ListUsers()->get();
        // $users=User::all();
        return view('managers.userList',['users' => $users]);
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
    public function destroy(User $user)
    {
        //
        //   dd($user);
            $user->delete();
            return redirect()->action(
                'userManageController@index'
            );   
    

    }

    public function promote(User $user)
    {
        //  dd($user);
            $user->is_admin =1;
            $user->save();
            // dd($user);
            return redirect()->action(
                'userManageController@index'
            );  
    

    }

    public function activate(User $user)
    {
        //  dd($user);
            $user->is_active =0;
            $user->save();
            // dd($user);
            return redirect()->action(
                'userManageController@index'
            );  
    

    }

    public function inactivate(User $user)
    {
        //  dd($user);
            $user->is_active =1;
            $user->save();
            // dd($user);
            return redirect()->action(
                'userManageController@index'
            );  
    

    }
}
