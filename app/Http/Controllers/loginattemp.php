<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\admin;
use App\hamburger;
use App\shop;
use Illuminate\Support\Facades\Validator;
class loginattemp extends Controller
{
    public function index(Request $request)
    { 
    	ob_start(); 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
		$usr=$request->input("usr");
		$pwd=$request->input("pwd");
        $validate=Validator::make($request->all(),[
            'usr'=>'required',
            'pwd'=>'required'
            ]);
        if($validate->fails())
        {
            $_SESSION["message"]="Please fill all the fields";  
            return redirect("/inicio");
        } 
		$u = admin::where([['username',$usr],['password' , $pwd]])->get(); 
		$row1=count($u);
		$u = customer::where([['username',$usr],['password' , $pwd]])->get(); 
		$row2=count($u);   
		if($row1==1)
		{
			$_SESSION['message']="Admin Login Successfully";
			$_SESSION['tu']='admin';
			$_SESSION['tn']=$usr;
		}
		elseif($row2==1)
		{
			$_SESSION['message']="User Login Successfully";
			$_SESSION['tu']='user';
			$_SESSION['tn']=$usr;
		}
		else
		{
			$_SESSION['message']="Login Failed";
			$_SESSION['tu']='';
			$_SESSION['tn']='';
		}
		return redirect("/inicio");
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
