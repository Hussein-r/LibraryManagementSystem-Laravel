<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
app('App\Http\Controllers\ChartController')->index();

class managerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users=User::List()->get();
        return view('managers.managerList',['users' => $users]);
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
    public function show(User $manager)
    {
        //
        $manager=@auth::user()->id;
        // dd($manager);
        return view('managers.managerHome',['manager'=>$manager]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manager)
    {
        //
        // $manager=@auth::user()->id;
        return view('managers.managerProfile',['manager'=>$manager]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $manager)
    {
        //
        $data=request()->validate([
            
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required',

    ]);
    
            $manager->update($data);
    
            // return view('managers.managerHome', ['manager'=>$manager,'chart'=>$chart]);
            return redirect()->action(
                'ChartController@index'
            );
        }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager)
    {
        $manager->delete();
        return redirect()->action(
            'managerController@index'
        );   
    

    }

    public function unpromote(User $manager)
    {
        //  dd($manager);
            $manager->is_admin =0;
            $manager->save();
            // dd($manager);
            return redirect()->action(
                'managerController@index'
            );   
    

    }



}
