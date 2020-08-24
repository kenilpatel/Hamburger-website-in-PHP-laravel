<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message_list;
use DB;
use Illuminate\Support\Facades\Validator; 
class contactodata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        ob_start();
        session_start(); 
        $name=$request->input('name');
        $email=$request->input('email');
        $sub=$request->input('sub');
        $msg=$request->input('msg'); 
        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'sub'=>'required',
            'msg'=>'required'
            ]);
        if($validate->fails())
        {
            $_SESSION["message"]="Please fill all the fields";  
            return redirect("/inicio");
        } 
        $validate1=Validator::make($request->all(),[ 
            'email'=>'email', 
            ]);
        if($validate1->fails())
        {
            $_SESSION["message"]="Email address should be in the format aaa@gmail.com";  
            return redirect("/inicio");
        }  
        $status="unread";  
        $form= new message_list();
        $form->name=$name;
        $form->email=$email;
        $form->subject=$sub;
        $form->message=$msg;
        $form->status=$status;
        $form->save();
        $_SESSION["message"]="Message sent successfully";  
        return redirect("/contacto"); 
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
    public function show($id)
    {
        //
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
    }
}
