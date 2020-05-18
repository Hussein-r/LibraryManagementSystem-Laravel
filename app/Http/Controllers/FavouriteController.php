<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;


class FavouriteController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
    
                $fav = Favourite::where(['user_id'=>Auth::id(),'book_id'=>$request->book]);
                if($fav->exists()){
                    $fav->delete();
                   return response()->json(["like"=>"no"]);
                }
                else
                {    
                    $fav=new Favourite();
                    $fav->user_id=Auth::id();
                    $fav->book_id=$request->book;
                    $fav->save();
                    return response()->json(["like"=>"yes"]);
                }
                
            
    
    
}
}