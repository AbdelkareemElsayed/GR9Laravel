<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\blog;

class blogController extends Controller
{


   public function __construct(){

          $this->middleware('AdminAuth',['except' => ['index']]);
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = blog::join('admins','admins.id','=','blog.addedBy')->select('blog.*','admins.name')->orderBy('id','desc')->get();

        return view('blogs.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('blogs.create');

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

        $data = $this->validate(request(),
           [
               "title"   => "required|min:5",
               "content" => "required|min:30",
               "image"   => "required|image|mimes:png,jpg,gif,svg"
           ]);

           $FinalName = time().rand().'.'.$request->image->extension();

           # Storage/App/ ...
           // $request->image->storeAs('blogImages',$FinalName);


           # public folder
            if($request->image->move(public_path('blogImages'),$FinalName)){

              $data['image'] = $FinalName;
              $data['addedBy'] = auth('admin')->user()->id;

              $op =  blog::create($data);

              if($op){
                  $message = "Raw Inserted";
              }else{
                  $message = "Error Try Again";
              }

            }else{
                $message = "Error In Uploading Try Again";
            }

             session()->flash('Message',$message);

             return redirect(url('/Blog'));

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



          dd('show method');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $data = blog::find($id);
         return view('blogs.edit',['data' => $data]);
    }

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

        dd($request);

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

        $data = blog::find($id);

         $op = blog::where('id',$id)->delete();

          if($op){

             unlink(public_path('blogImages/'.$data->image));

              $message = "Raw Removed";
          }else{
              $message = "Errot Try Again";
          }

          session()->flash('Message',$message);

          return redirect(url('/Blog'));

    }
}
