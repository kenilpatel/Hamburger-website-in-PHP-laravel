<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\hamburger;
use App\customer;
use Mail;
class userorder extends Controller
{
    public function index()
    {
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
		$s=ret_session();
		$user=explode(",",$s);  
	 	$orderid=time();
	 	$date=date("Y/m/d"); 
	 	$cart=$_COOKIE["cart".$_SESSION['tn']]; 
		$array=explode("\n",$cart);   
		$tot_price=0;
		$cnt=0;
		$orderstring="";
		$username=$user[1]; 
		foreach ($array as $key => $value) 
		{   
			if(strcmp($value,"")!=0)
			{  
				$cnt++;
				$burger=explode(",",$value); 
				$qty1=$burger[0];
				$ec=$burger[1];
				$nc=$burger[2];
				$si=$burger[3];
				$price=$burger[4];
				$img=$burger[6];
				$name=$burger[7]; 
				$orderstring=$orderstring.$name;
				if($ec!=0)
				{
					$orderstring=$orderstring." with $ec extra slice of cheese";
				}
				else if($nc=="yes")
				{
					$orderstring=$orderstring." with no cheese";
				}
				else
				{
					$orderstring=$orderstring." with normal cheese";
				}
				$orderstring=$orderstring.":$qty1";
				$orderstring=$orderstring.":$price";
				$orderstring=$orderstring.",";
				$tot_price=$tot_price+$price; 
				$row = hamburger::where("name","=",$name)->get();  
				$total_sold=$row[0]["total_sold"]; 
				$total_sold=$total_sold+$qty1; 
				DB::update('update hamburgers set total_sold=? WHERE name=?',[$total_sold,$name]); 
			}
		} 
		$orderstring=$orderstring;
		$len=strlen($orderstring); 
		// $orderstring[$len-1]=""; 
		$orderfinal=explode(",",$orderstring);  
		$msgbody="<table style=\"text-align:left;border:1px solid black;border-collapse: collapse;\"><tr><th style=\"padding:15px;border:1px solid black;\">Item_Name</th><th style=\"padding:15px;border:1px solid black;\">Quantity</th><th style=\"padding:15px;border:1px solid black;\">Price</th></tr>";
		foreach ($orderfinal as $key => $value) 
		{   
			if(strcmp($value,"")!=0)
			{
				$burgerdetail=explode(":",$value);
				$in=$burgerdetail[0];
				$qty=$burgerdetail[1];
				$price=$burgerdetail[2]; 
				$msgbody=$msgbody."<tr><td style=\"padding:15px;border:1px solid black;\">".$in."</td><td style=\"padding:15px;border:1px solid black;\">".$qty."</td><td style=\"padding:15px;border:1px solid black;\">$".$price."</td></tr>"; 
			}
		}
		$msgbody=$msgbody."<tr><td style=\"padding:15px;border:1px solid black;\" colspan=\"3\">Total Price : $$tot_price</td></tr>";
		$msgbody."</table>";
		echo $msgbody; 
		$s=ret_session();
		$user=explode(",",$s); 
		$row = customer::where("username","=",$user[1])->get();
		$email=""; 
			$email=$row[0]["email"]; 
		$headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $to_name = '';
		$to_email = $email;
		$data = array('name'=>"", "body" => $msgbody);
		    
		Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
		    $message->to($to_email, $to_name)
		            ->subject('Thanks for registration');
		    $message->from('ibrashamburgers@gmail.com','Ibras hamburgers');
		});
		 
		DB::insert('insert into `orders` (orderid,username,items,total_amount,date) values(?,?,?,?,?)',[$orderid,$username,$orderstring,$tot_price,$date]); 
		setcookie("cart".$_SESSION['tn'], "", time() + (86400 * 30), "/");
		$_SESSION["message"]="Order placed successfully thanks for the order"; 
		return redirect("/orderhistory");
    }
}
