<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //php artisan make:controller name ...

  public function create(){

      return view('create');
  }


   public function store(Request $request){
       #  code ..... 
       // dd($request);

    //    echo $request->name;
    //    echo $request->password;
    //    echo $request->input('name');
          
        // dd($request->all());

        // dd($request->only(['name','email']));
       // dd($request->except(['_token']));

    //    dd($request->has('age'));
    //    echo  $request->ip();

        // echo $request->method(); 
       //  dd($request->isMethod('put'));
        // echo $request->path();
        // echo $request->url();
        // echo  $request->fullurl();


    
         $this->validate($request,[
             "name"     => "required|min:3",
             "password" => "required|min:6|max:10",
             "email"    => "required|email"
         ]);


   // code ..... 
   echo 'test message';

   }


   public function UserInfo(){
       // code ..... 

       $details = ["Name" => "Root Account" , "Age" => 20 , "Grade" => 3.4 , "Level" => 2];

       $city = ['Cairo','Giza','Alex'];

     //   return view('userDetails',["data" => $details , 'cities' => $city]);
    //    return view('userDetails')->with('data',$details)->with('cities',$city);
   //     return view('userDetails')->with(["data" => $details , 'cities' => $city]);
          return view('userDetails',compact('details','city'));
     
}


}
