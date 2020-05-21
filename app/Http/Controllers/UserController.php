<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lease;
use App\Book;
use App\Favourite;

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',['user'=>User::find($id)]);
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
       $user = User::find($id);
       $user->name = $request->name;
       $user->username = $request->username;
       $user->email = $request->email;

        // $request = app('request');
        if ($request->hasFile('avatar')) {
            $imageName = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('images'), $imageName);
            $user->avatar = $imageName;

        }
       $user->save();
       return redirect()->route('user.show',['user'=>User::find($id)]);

    }

    public function my_books($id)
    {
        // $books_info = Book::all()->leases();
        $books = Lease::where('user_id',$id)->get();
        return view('user.mybooks',['leases'=>$books]);
    }

    public function my_favorite($id)
    {
        $books = Favourite::where('user_id',$id)->get();
        return view('user.favourite',['favourites'=>$books]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
