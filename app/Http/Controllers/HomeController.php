<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $search=$request->get('search');
        $books=Book::where("title","like","%". $search ."%")
         ->orWhere("auther","like","%". $search ."%")
         ->paginate(2);
         return view(
             'home',['books' => $books,
        'categories' => $categories
         ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sort($sort_value)
    {
        $books = Book::paginate(2);
        $categories = Category::all();
        $books->setCollection(
            $books->sortByDesc($sort_value)
        );
        return view('home', [
            'books' => $books,
            'categories' => $categories
        ]);
    }
    public function index()
    {
        $books=Book::paginate(2);
        $categories = Category::all();
        return view('home', [
            'books' => $books,
            'categories' => $categories
        ]);
        
    }
   
   public function category($category){
       
        $categories = Category::all();
        $selectedCategory = Category::find($category);
        $books = Category::find($category)->books()->paginate(2);
        return view('home', compact('categories','selectedCategory','books'));
    
}
    
}
