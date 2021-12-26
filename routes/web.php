<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('Message/{name}/{id?}',function ($name , $id = null){
    echo 'Student Data name:'.$name.'& id = '.$id;
})->where(['id' => '[0-9]+','name'=>'[a-zA-Z]+']);
//->where('id','[0-9]+')->where('name','[a-zA-Z]+');




//  Route::get("TestMessage",function (){
//     return view('message');
// }); 

// Route::view('TestMessage','message');

// http://localhost/group9Laravel/public/Message?id=99
// http://localhost/group9Laravel/public/Message/99


/*
 get 
 post 
 put
 patch 
 delete 
 option 
 match 
 view
 resource 
*/