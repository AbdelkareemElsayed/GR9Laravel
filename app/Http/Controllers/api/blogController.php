<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\Validator;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = blog::join('admins','admins.id','=','blog.addedBy')->select('blog.*','admins.name')->orderBy('id','desc')->get();

          return response()->json(["blog" => $data]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(),
           [
               "title"   => "required|min:5",
               "content" => "required|min:30",
               "image"   => "required|image|mimes:png,jpg,gif,svg"
           ]);

         if($validator->fails()){
             return response()->json(['errors' => $validator->errors()]);
         }else{


           $FinalName = time().rand().'.'.$request->image->extension();

        //    # public folder
            if($request->image->move(public_path('blogImages'),$FinalName)){

              $data = $request->all();

              $data['image'] = $FinalName;
              $data['addedBy'] = 1;


              $op =  blog::create($data);

              if($op){
                  $message = "Raw Inserted";
              }else{
                  $message = "Error Try Again";
              }

            }else{
                $message = "Error In Uploading Try Again";
            }

            return response()->json(['Message' => "Raw Created."]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = blog::find($id);

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    //     $data = blog::find($id);

    //     return response()->json(['data' => $data]);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

       blog::find($id)->delete();

       return response()->json(['message' => "Raw Removed" ]);

    }


    public function message(){
        return response()->json(['message' => "blog controller api" ]);
    }


}
