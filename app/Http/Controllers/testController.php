<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //

     public function message(){
       
         return view('message');
     
     }


public function details(){
    echo 'User Details Name : Root & Id = 20130299';
}

   

}
