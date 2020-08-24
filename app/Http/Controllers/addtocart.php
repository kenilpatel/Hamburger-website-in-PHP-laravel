<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hamburger;
class burger
{
	public $quantity;
	public $extracheese;
	public $remove;
	public $special_instruction;
	public $price;
	public $bid;
	function setdata($quantity=0,$extracheese=0,$remove="yes",$special_instruction="N/A",$price=0,$bid=0,$img="",$name="",$ts="")
	{
		$this->quantity=$quantity;
		$this->extracheese=$extracheese;
		$this->remove=$remove;
		$this->special_instruction=$special_instruction;
		$this->price=$quantity*$price+$extracheese*2*$quantity;
		$this->bid=$bid;
		$this->img=$img;
		$this->name=$name;
		$this->ts=$ts;
	}
	function string()
	{
		return $this->quantity.",".$this->extracheese.",".$this->remove.",".$this->special_instruction.",".$this->price.",".$this->bid.",".$this->img.",".$this->name.",".$this->ts;
	}
}
class addtocart extends Controller
{
     public function index()
    {
    	ob_start();
		session_start();
		$bid=request("bid");
		$qty=request("qty");
		$qty1=request("qty1");
		$remove_cheese=request("cheese");
		if(strcmp(request("si"),"")!=0)
		{
			$si=request("si");
		}
		else
		{
			$si="N/A";
		}
		$row=hamburger::where("burgerid","=",$bid)->get();  
		$price=$row[0]['price']; 
		$img=$row[0]['photo']; 
		$name=$row[0]['name']; 
		$burger1=new burger();
		$burger1->setdata($qty,$qty1,$remove_cheese,$si,$price,$bid,$img,$name,time());
		echo $burger1->string();
		if(!isset($_COOKIE["cart".$_SESSION['tn']])) 
		{  
		    echo "cart".$_SESSION['tn'];
			setcookie("cart".$_SESSION['tn'], $burger1->string(), time() + (86400 * 30), "/"); 
		} 
		else 
		{
		     echo "cart".$_SESSION['tn'];
		    $arrayobject=$_COOKIE["cart".$_SESSION['tn']]; 
		    $arrayobject=$arrayobject."\n".$burger1->string();
			setcookie("cart".$_SESSION['tn'], $arrayobject, time() + (86400 * 30), "/");
		}
		$_SESSION["message"]="Burger added to cart successfully"; 
		return redirect("/menu");
	}
}
