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
    
                $fav = Favourite::firstOrNew(['user_id'=>Auth::id(),'book_id'=>$request->book]);
                if($fav->exists()){
                    Favourite::where('user_id',Auth::id())->where('book_id',$request->book)->delete();
                   return response()->json(["like"=>"no"]);
                }
                else
                {    
                    $fav->save();
                    return response()->json(["like"=>"yes"]);
                }
                
            
    
    
}
}