<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;

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
   public function search()
   {
    $result=Input::get('result');
    $books=Book::where("title","LIKE","%". $result ."%")
        ->orWhere("auther","LIKE","%". $result ."%")
        ->get();
        return view('home',['books' => $books]);
   }
   public function category($category){
       
        $categories = Category::all();
        $selectedCategory = Category::find($category);
        $books = Category::find($category)->books()->paginate(2);
        return view('home', compact('categories','selectedCategory','books'));
    
}
    
}
