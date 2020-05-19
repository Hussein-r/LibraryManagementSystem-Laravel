<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rate;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'rate'=>'required',
            'book_id'=>'required|numeric',
        ]);
        $result=Rate::where([["book_id","=",$request->book_id],["user_id","=",@auth::user()->id]])->get();
        if ($result->isEmpty()){ 
        $Rate= new Rate();
        $Rate->user_id=@auth::user()->id;
        $Rate->book_id=$request->book_id;
        $Rate->rating=$request->rate;
        $Rate->save();
        return Redirect::back();
        }else{
            return Redirect::back()->withErrors(['You Already Rated This Book with '.$result[0]->rating.' stars']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $book
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Rate $rate)
    {
        
    }
}
