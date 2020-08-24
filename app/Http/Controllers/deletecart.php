<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deletecart extends Controller
{
   public function index()
    { 
    	ob_start();
		$data=request('datad');
		// echo $data;
		$data = str_replace('_', ' ', $data);
		session_start();
		if(isset($_COOKIE["cart".$_SESSION['tn']]))
		{
			
			$cn=$_COOKIE["cart".$_SESSION['tn']];
			// echo $cn."<br><br><br>"; 
			$cn = str_ireplace($data,'', $cn); 
			// echo $cn;
			setcookie("cart".$_SESSION['tn'], $cn, time() + (86400 * 30), "/");
		}  
		// echo $_COOKIE["cart".$_SESSION['tn']];
		$_SESSION["message"]="Burger deleted from cart successfully"; 
		 return redirect("/cart");
    }
}
