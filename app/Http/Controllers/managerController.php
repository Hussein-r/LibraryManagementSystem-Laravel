<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $id=@auth::user()->id;
        $users=User::List()->get();
        return view('managers.managerList',['users' => $users,'id'=>$id]);
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
      
        
        return view('managers.managerHome',['manager'=>$manager]);

    }


    public function profile(User $manager)
    {
        //
        // dd(@auth::user()->is_admin);
        $manager=@auth::user();
        // dd($manager);
        return view('managers.managerPage',['manager'=>$manager]);

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
    public function update(User $manager,Request $request)
    {
        //
        $data=$this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required',
            'username'=>'required',
            'avatar'=>'required',
        ]);
        if ($request->hasFile('avatar')) {
            $imageName = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('images'), $imageName);
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->password = Hash::make($request['password']);
            $manager->username = $request->username;
            $manager->avatar = $imageName;
            $manager->save();
        }
    
            
    
            // return view('managers.managerHome', ['manager'=>$manager,'chart'=>$chart]);
            return redirect()->action(
                'managerController@profile'
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
          $manager->is_admin=0;
          $manager->save();
          // dd($manager);
          return redirect()->action(
              'managerController@index'
          );  
    

    }



}
