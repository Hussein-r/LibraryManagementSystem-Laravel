<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Auth;
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
         ->paginate(3);
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
    public function sort($sort)
    {
        $books = Book::paginate(3);
        $categories = Category::all();
        $books->sortByDesc(
            $books->sortBy($sort)
        );
        return view('home', [
            'books' => $books,
            'categories' => $categories
        ]);
    }
    public function index()
    {
        $books=Book::paginate(3);
        $categories = Category::all();

        if (@auth::user()->isAdmin==1) {
        return redirect()->action(
            'ChartController@index'
        );
    }
    else{
        return view('home', [
            'books' => $books,
            'categories' => $categories
        ]);

    }

       


        
    }
   
   public function category($category){
       
        $categories = Category::all();
        $selectedCategory = Category::find($category);
        $books = Category::find($category)->books()->paginate(3);
        return view('home', compact('categories','selectedCategory','books'));
    
}
    
}
