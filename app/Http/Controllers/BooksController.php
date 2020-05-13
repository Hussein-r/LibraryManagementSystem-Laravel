<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return view('Books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('Books.create',['categories' => $categories]);
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
            'title' => 'required|unique:books',
            'details' => 'required',
            'auther' => 'required',
            'copies'=>'required|numeric',
            'price'=>'required',
            'image'=>'required',
            'category_id'=>'required|numeric',
        ]);
        $Book= new Book();
        $Book->title=$request->title;
        $Book->details=$request->details;
        $Book->auther=$request->auther;
        $Book->copies=$request->copies;
        $Book->price=$request->price;
        $Book->category_id=$request->category_id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $Book->image=$imageName;
        }
        $Book->save();
        return redirect()->action(
            'BooksController@index'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $category=Category::where("id","=",$book->category_id)->get();
        return view('Books.show',['book'=>$book,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories=Category::all();
        return view('Books.edit',['book'=> $book,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $Book)
    {
        $data=$this->validate($request,[
            'title' => 'required',
            'details' => 'required',
            'auther' => 'required',
            'copies'=>'required|numeric',
            'price'=>'required',
            'image'=>'required',
            'category_id'=>'required|numeric',
        ]);
        $Book->title=$request->title;
        $Book->details=$request->details;
        $Book->auther=$request->auther;
        $Book->copies=$request->copies;
        $Book->price=$request->price;
        $Book->category_id=$request->category_id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $Book->image=$imageName;
        }
        $Book->save();
        return redirect()->action(
            'BooksController@index'
        );    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->action(
            'BooksController@index'
        );   
    }
}
