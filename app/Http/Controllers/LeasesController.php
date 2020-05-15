<?php

namespace App\Http\Controllers;
use App\Book;
use App\Lease;
use Illuminate\Http\Request;
use Auth;
use Redirect;


class LeasesController extends Controller
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
        return view('Leases.create');
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
            'days' => 'required',
            'price'=> '',
        ]);
        $result=Lease::where([["book_id","=",$request->book_id],["user_id","=",@auth::user()->id]])->get();
        if ($result->isEmpty()){ 
            $lease=new Lease();
            $lease->user_id=@auth::user()->id;
            $lease->book_id=$request->book_id;
            $lease->price=$request->price;
            $lease->days=$request->days;
            $lease->save();
            $books=Book::where("id","=",$request->book_id)->get();
            foreach ($books as $book){
                $book->copies=$book->copies -1;
            }
            $book->save();
            return redirect()->action(
                'BooksController@showProfile',['book'=>$book]
            );   
        }else{
            return Redirect::back()->withErrors(['You Already Have This Book On Lease']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show(Lease $lease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function edit(Lease $lease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lease $lease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lease $lease)
    {
        $lease->delete();
        return redirect()->action(
            'BooksController@index'
        );   
    }
}
