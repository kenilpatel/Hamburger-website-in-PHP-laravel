 <?php 
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
	if(isset($_SESSION['message']))
	{
		if($_SESSION['message']!="")
		{
			echo '<script>alert("'.$_SESSION['message'].'")</script>'; 
		} 
		
	}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="ciudad.css" > 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script> 

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<body> 
	<?php  
    	if(isset($_SESSION['message']))
    	{ 
    		if($_SESSION['message']!="")
    		{ 
    			echo "<noscript><h4 style='text-align:center;'>".$_SESSION['message']."</h4></noscript>"; 
    			$_SESSION['message']="";
    		} 
    		
    	}
    ?>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="user_menu" class="tl">Order Hamburgers</a>
	  <a href="cart" class="tl">Cart</a>
	  <a href="orderhistory" class="tl">Order History</a>
	  <a href="Editu"  class="tl">Edit Data</a>
	  <a href="editpassword_user" style="color:red;" class="tl">Change password</a>  
	  <a href="logout" class="tl">Logout</a>  
	</div>


	 <div class="contacto darken text">
		<div class="topnav" id="myTopnav">
			<a><img src="resources/5.png" id="logo"></img></a>
			 
			<a  href="inicio">INCIO</a>
			<a  href="sobre_nosotros">SOBRE NOSOTROS</a>
			<a  href="menu">MENU</a>
			<a href="http://txp9131.uta.cloud/blog/">BLOG</a>
			<a  href="contacto" >CONTACTO</a> 
		   	<a href="user"><?php echo $user[1]; ?></a>
		   	<a href="logout" class="tl">LOGOUT</a>  
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		  </a>
		</div>

		<div class="triangle1"></div>
		<div class="wrapperincio1_message">  
			<br>
			<br>

			<button onclick="openNav()">Open User Pannel</button>
		</div>
		<div class="triangle2"></div>
	</div>

	<div class="middlewrapper">
			<img src="resources/Burguer.png" id="burgerlogo"></img>
				<h1 class="hola">Edit Password</h1>
			<form class="form1" id="form1" onsubmit="return form1()" action="changeup" method="post" >
				{{csrf_field()}}
		 	<div class="row"> 
		      <div class="col-75">
		        <input type="password" id="pwd1" name="pwd1" placeholder="Password" required>
		        
		      </div>
		      <div class="col-75">
		        <input type="password" id="pwd2" name="pwd2" placeholder="Repeat Password" required>
		        <br>
		      </div>  
		    </div>
		    <br>
		    <br>
		    <br>
			<div><button type="submit" form="form1">Change Data</button></div>
		 </form>
		  
	</div>
	@foreach($forms1 as $row)
	<div class="incio_footer darken text" >
	         <div class="wrapperfooter">
	                 <div class="triangle"></div>
	                 <img src="resources/5.png"></img>
	                 <p class="highlight">Habla a:</p>
	                 <p>{{$row['address']}}</p>
	                 <p class="highlight">Telefono:</p>
	                 <p>{{$row['telephone_no']}}</p>  
	                 <p class="highlight">Correo:</p>
	                 <p>{{$row['email']}}</p>   
	                 <a href="#" class="fa fa-pinterest"></a>
	                 <a href="#" class="fa fa-facebook"></a>
	                 <a href="#" class="fa fa-twitter"></a>
	                 <a href="#" class="fa fa-instagram"></a>
	                 <a href="#" class="fa fa-linkedin"></a>
	                 <a href="#" class="fa fa-vimeo"></a>  
	                 <h5>Copyright &copy2020 Todos los ders reservados | Este sitio esta h con &hearts por DiazApps</h5>
	                 <br>
	         </div>
	</div>
	@endforeach 
	 
</body> 

<script>

	function form1() 
	{ 
	  var x1=document.getElementById("pwd1").value;
	  var x2=document.getElementById("pwd2").value;  
	  if (x1 != x2) 
	  {
	    alert("Both password should be same");
	    document.getElementById("form1").reset();
	    return false;
	  }
	  else
	  { 
	  	if(x1.length>=8 && x2.length<=10)
	  	{
	   		return true;
	  	}
	   	else
	   	{
	   		alert("Password should be between 8 to 10 allowed characters ");
	   		return false;
	   	}
	  }
	}

</script>