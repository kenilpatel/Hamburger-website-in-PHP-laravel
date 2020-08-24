<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use DB;
class changeap extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        ob_start();
        session_start(); 
        function ret_session()
        {
            if(isset($_SESSION['tu']))
            {
                if(strcmp($_SESSION['tu'], "admin")==0)
                {
                    return "admin,".$_SESSION['tn'];
                }   
                elseif(strcmp($_SESSION['tu'], "user")==0)
                {
                    return "user,".$_SESSION['tn'];
                }      
                else 
                {
                    return "na,na";
                }  
            }
            else
            {
                return "na,na";
            }
        }   
        $pwd=request('pwd1');
        $s=ret_session();
        $user=explode(",",$s);  
        DB::update("UPDATE admin SET password=? where username=?",[$pwd,$user[1]]); 
        $_SESSION["message"]="password changed successfully"; 
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
