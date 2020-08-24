<?php
    ob_start(); 
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
	<title>Order History</title>
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
	  <a href="menu" class="tl">Order Hamburgers</a>
	  <a href="cart" class="tl">Cart</a>
	  <a href="orderhistory" style="color:red;" class="tl">Order History</a>
	  <a href="Editu" class="tl">Edit Data</a> 
	  <a href="editpassword_user" class="tl">Change password</a> 
	  <a href="logout" class="tl">Logout</a>  
	</div>


	 <div class="chome darken text">
		<div class="topnav" id="myTopnav">
			<a><img src="resources/5.png" id="logo"></img></a>
			 
			<a  href="inicio">INCIO</a>
			<a  href="sobre_nosotros">SOBRE NOSOTROS</a>
			<a  href="menu">MENU</a>
			<a href="http://txp9131.uta.cloud/blog/">BLOG</a>
			<a  href="contacto" >CONTACTO</a> 
		   	<a href="user"  ><?php echo $user[1]; ?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
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

	<div class="wrappermiddleu">
			<h1>Recent orders</h1> 
			<br>
			<br>
			
			    
			    
			    	@foreach($forms2 as $row)     
							<figure class="border">
			   				<img src="resources/burguer.png" class="menuimg">
			   				<hr>
							<figcaption class="lefts">
							<h3>Order Number : #{{$row['orderid']}}</h3> 
							<h3>Order Date : {{$row['date']}}</h3> 
							@foreach($row['ds'] as $os)
								<h3>{{$os}}</h3>
							@endforeach
							<h3 class="red">Grand Total: ${{$row['total_amount']}}</h3>
							</figcaption>
							</figure> 
					@endforeach 
			    
			 
			  
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