<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop;
use DB;
class updateshop extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $id=0)
    {
        //
        ob_start();
        // include 'db.php';
        $row = shop::where("shopid","=",1)->get(); 
        $telno=$row[0]['telephone_no'];
        $email=$row[0]['email'];
        $add=$row[0]['address'];  
        if(request('email')!="")
        {
            $email=request('email');
        }
        if(request('tel')!="")
        {
            $telno=request('tel');
        }
        if(request('address')!="")
        {
            $add=request('address');
        } 
        DB::update("UPDATE shops SET telephone_no=?,email=?,address=? where shopid='1'",[$telno,$email,$add]); 
         session_start();
        $_SESSION["message"]="Data updated successfully"; 
        return redirect("/inicio");
       
    
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
