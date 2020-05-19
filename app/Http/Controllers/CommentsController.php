<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class CommentsController extends Controller
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
            'comment'=>'required',
            'book_id'=>'required|numeric',
        ]);
        $Comment= new Comment();
        $Comment->user_id=@auth::user()->id;
        $Comment->book_id=$request->book_id;
        $Comment->comment=$request->comment;
        $Comment->save();
        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $book
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Comment $comment)
    {
        
    }
}
