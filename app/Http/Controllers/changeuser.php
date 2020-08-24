<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use DB;
class changeuser extends Controller
{
    public function index()
    {
        //
        ob_start(); 
        session_start();
		$old=request("oldusername"); 
		echo $old;
		$row = customer::where("username","=","kenil")->get();  
		echo $row;  
		$usn=$row[0]['username'];
		$email=$row[0]['email'];
		$add=$row[0]['address']; 
		if(request('email')!="")
		{
			$email=request('email');
		} 
		if(request('address')!="")
		{
			$add=request('address');
		} 
		DB::update("UPDATE customers SET username=?,email=?,address=? where username=?",[$usn,$email,$add,$usn]); 
		$_SESSION["message"]="Data changed successfully";
		return redirect("/inicio");
    }
}
