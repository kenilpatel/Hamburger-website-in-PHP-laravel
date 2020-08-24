<?php 
    ob_start();
	session_start();  
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
	<title>Contacto</title>
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
	 


	 <?php if(isset($_SESSION['tu'])): ?>
		<?php if(strcmp($_SESSION['tu'], "admin")==0): ?>
			 <div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="menu" class="tl">Hamburgers</a>
		  <a href="Edita" class="tl">Shop Info</a>
		  <a href="message" class="tl">Messages</a> 
		  <a href="editpassword_admin" class="tl">Change password</a>
		  <a href="logout" class="tl">Logout</a>  
		</div>
		<?php elseif(strcmp($_SESSION['tu'], "user")==0):?>
			 <div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="menu" class="tl">Order Hamburgers</a>
		  <a href="cart" class="tl">Cart</a>
		  <a href="orderhistory" class="tl">Order History</a>
		  <a href="Editu" class="tl">Edit Data</a> 
		  <a href="editpassword_user" class="tl">Change password</a>
		  <a href="logout" class="tl">Logout</a>  
		</div>
		<?php else:?>
			 
		<?php endif; ?>
	<?php else: ?>
		 
	<?php endif; ?>
	<div class="incio1 darken text">
		<div class="topnav" id="myTopnav">
			<a><img src="resources/5.png" id="logo"></img></a>
			<a   href="inicio">INCIO</a>
			<a  href="sobre_nosotros">SOBRE NOSOTROS</a>
			<a    href="menu">MENU</a>
			<a href="http://txp9131.uta.cloud/blog/">BLOG</a>
			<a style="color:red;"  href="contacto">CONTACTO</a>
			<?php if(isset($_SESSION['tu'])): ?>
		   			<?php if(strcmp($_SESSION['tu'], "admin")==0): ?>
		   				<a href="inicio"><?php echo $_SESSION['tn']; ?></a></a>
		   				<a href="logout" class="tl">LOGOUT</a>  
						  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
						    <i class="fa fa-bars"></i>
						  </a>
		   			<?php elseif(strcmp($_SESSION['tu'], "user")==0):?>
		   				<a href="inicio"><?php echo $_SESSION['tn']; ?></a>
		   				<a href="logout" class="tl">LOGOUT</a>  
						  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
						    <i class="fa fa-bars"></i>
						  </a>
		   			<?php else:?>
		   				<a href="#popup1">REGISTRO</a>
						<a href="#popup">INCIAR SESSION</a>	
						<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		   			<?php endif; ?>
		   		<?php else: ?>
		   			<a href="#popup1">REGISTRO</a>
					<a href="#popup">INCIAR SESSION</a>
					<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		   		<?php endif; ?>	
		   
		  
		  </a>
		</div>

		<div class="triangle1"></div>
		<div class="wrapperincio1_message">
			<h4>Di Hola</h4>
			<h1>Contacto</h1> 
			<?php if(isset($_SESSION['tu'])): ?>
				<?php if(strcmp($_SESSION['tu'], "admin")==0): ?>
					  <button onclick="openNav()">Open Admin Pannel</button> 
				<?php elseif(strcmp($_SESSION['tu'], "user")==0):?>
					  <button onclick="openNav()">Open User Pannel</button>
				<?php else:?>
					  
				<?php endif; ?>
			<?php else: ?>
				 	 
			<?php endif; ?>	
		</div>
		<div class="triangle2"></div>
	</div>

	<div class="middlewrapper">
		<img src="resources/Burguer.png" id="burgerlogo"></img>
		<h1 class="hola">Di  hola</h1>
		<h5 class="hola">Di hola, envianos un mensaje</h5>
		<h4 class="hola">Envianos tus comentarios y suguerncias ustedes son  importante para nosotros</h4>
		<br></br>
		 <form class="form1" id="form1" onsubmit="return validatecontacto()" method="post" action="{{URL::to('/contactodata')}}">
		 	{{csrf_field()}}
		 	<div class="row"> 
		      <div class="col-75">
		        <input type="text" id="fname" name="name" placeholder="Name" required>
		        
		      </div>
		      <div class="col-75">
		        <input type="email" id="email" name="email" placeholder="Email id" required>
		        <br>
		      </div>
		      <div class="col-75">
		        <input type="text" id="sub" name="sub" placeholder="Subject" required>
		        
		      </div>
		      <div class="col-75">
		        <textarea name="msg" id="msg" rows="8" required placeholder="Message"></textarea>
		      </div>
		    </div>
		    <br>
		    <br>
		    <br>
			<div><button type="submit" form="form1">ENVIAR MENSAJE</button></div>
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

	
<?php if(isset($_SESSION['tu'])): ?>
	<?php if(strcmp($_SESSION['tu'], "admin")==0): ?>
		   <div id="popup" class="overlay">
		<div class="popup">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a>  
			<div class="content">
				<br>
				 <span style="color:black">Name : <span id="burger_name">keni</span></span>
				 <br>
				 <br>
				 <span style="color:black">Bread Type : <span id="burger_bt">kenil</span></span>
				 <br>
				 <br>
				 <span style="color:black">Reciepes :<span id="burger_br">kenil</span></span>
			</div> 
		</div>
	</div>

	<div id="popup1" class="overlay">
		<div class="popup1">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a> 

			<form id="pform2" action="updateburger" method="post" onsubmit="return filevalidate()" enctype="multipart/form-data">
			<div class="content">
				<br>
				<input type="hidden" name="bid" id="bid">
				<span style="color:black">Name : </span>
				<input type="text" name="fname" id="fname">
				<br><br>
				<span style="color:black">Price : </span>
				<input type="number" name="pburger" id="pburger">
				<br><br>
				<span style="color:black">Bread Type : </span>
				<input type="text" name="bt" id="bt">
				<br><br>
				<span style="color:black">Recipes : </span>
				<textarea name="rp" id="rp" rows="4"></textarea>
				<br><br>
				<span style="color:black">Image:</span>
				<input style="color:black;" type="file" name="fileToUpload" id="fileToUpload" >
				<br><br> 
				<div style="text-align:right"><button type="submit" form="pform2">Change Data</button></div>
			</div>
			</form>
		</div>
	</div> 
	<div id="popup2" class="overlay">
		<div class="popup2">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a> 

			<form id="pform3" action="addburger" method="post" onsubmit="return filevalidate1()" enctype="multipart/form-data">
			<div class="content">
				<br>
				<input type="hidden" name="bid" id="bid">
				<span style="color:black">Name : </span>
				<input type="text" name="fname" id="fname" required>
				<br><br>
				<span style="color:black">Price : </span>
				<input type="number" name="pburger" id="pburger" required>
				<br><br>
				<span style="color:black">Bread Type : </span>
				<input type="text" name="bt" id="bt" required>
				<br><br>
				<span style="color:black">Recipes : </span>
				<textarea name="rp" id="rp" rows="4" required></textarea>
				<br><br>
				<span style="color:black">Image:</span>
				<input style="color:black;" type="file" name="fileToUpload" id="fileToUpload" required>
				<br><br> 
				<div style="text-align:right"><button type="submit" form="pform3">Add Data</button></div>
			</div>
			</form>
		</div>
	</div> 
	<script type="text/javascript">
		function filevalidate() 
		{  
			name=document.getElementById("fname").value;
			bt=document.getElementById("bt").value;	
			bp=document.getElementById("pburger").value;	
			rp=document.getElementById("rp").value;
			file=document.getElementById("fileToUpload").value; 
			if(name=="" && bt=="" && rp=="" && file=="" && bp=="")
			{
				alert("Atleast one field should be filled");
				return false;
			}
			return true;
		}
		function constructmi(x)
		{ 
			document.getElementById("burger_name").innerHTML=" "+document.getElementById("nameb"+x).innerHTML;
			document.getElementById("burger_bt").innerHTML=" "+document.getElementById("breadt"+x).value;
			document.getElementById("burger_br").innerHTML=" "+document.getElementById("rec"+x).value;
		}
		function constructmi1(x)
		{ 
			document.getElementById("bid").value=x; 
		}
		function constructmi2(x)
		{  
			if (window.confirm("Do you really want to Delete?")) { 
			  window.open("deleteburger?bid="+x,false);
			} 
		}
	</script>
	<?php elseif(strcmp($_SESSION['tu'], "user")==0):?>
		<div id="popup" class="overlay">
		<div class="popup">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a>  
			<div class="content">
				<br>
				 <span style="color:black">Name : <span id="burger_name">keni</span></span>
				 <br>
				 <br>
				 <span style="color:black">Bread Type : <span id="burger_bt">kenil</span></span>
				 <br>
				 <br>
				 <span style="color:black">Reciepes :<span id="burger_br">kenil</span></span>
			</div> 
		</div>
	</div>

	<div id="popup1" class="overlay">
		<div class="popup1">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a> 
			<form id="pform2" action="addtocart" method="post">
			<div class="content">
				<br>
				<input type="hidden" name="bid" id="bid">
				<span style="color:black;">Quantity</span>
				<input type="number" id="qty" name="qty" value="1" min=1 max=10>
				<br>
				<br>
				<span style="color:black;">Remove Cheese</span>
				<input type="radio" id="cheese" name="cheese" value="yes"><span style="color:black;">Yes</span>
				<input type="radio" id="cheese" name="cheese" checked value="no"><span style="color:black;">No</span>
				<br>
				<br>
				<span style="color:black;">Extra Cheese</span>
				<input id="qty1" type="number" name="qty1" value="0" min=0 max=3>
				<br>
				<br>
				<span style="color:black;">Special Instruction</span>
				<textarea name="si" id="si" rows="4"></textarea>
				<div style="text-align:right"><button type="submit" form="pform2">Add to Cart</button></div>
			</div>
			</form>
		</div>
	</div>    
	<?php else:?>
		<div id="popup2" class="overlay">
		<div class="popup2">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a>  
			<div class="content">
				<br>
				 <span style="color:black">Name : <span id="burger_name">keni</span></span>
				 <br>
				 <br>
				 <span style="color:black">Bread Type : <span id="burger_bt">kenil</span></span>
				 <br>
				 <br>
				 <span style="color:black">Reciepes :<span id="burger_br">kenil</span></span>
			</div> 
		</div>
	</div>
		 <div id="popup" class="overlay">
		<div class="popup">
			<img src="resources/Burguer.png" id="burgerlogo"><span class="stylefont" style="color:black"> Inciar Sesion</span>
			<a class="close" href="#1">&times;</a> 

			<form id="pform1" method="post" action="{{URL::to('/loginattemp')}}" onsubmit="return pform4()">
				{{csrf_field()}}
				<div class="content">
					<br>
					<span style="color:black">Usuario:</span>
					<br>
					<input type="text" placeholder="" class="form-control input-lg" id="usr" name="usr" required>
					<br>
					<span style="color:black">Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd" name="pwd" required> 
					<div style="text-align:right"><br><br><button type="submit"  form="pform1">Entrar</button></div>
				</div>
			</form>

		</div>
	</div>



	<div id="popup1" class="overlay">
		<div class="popup1">
			<img src="resources/Burguer.png" id="burgerlogo"><span class="stylefont" style="color:black"> Registro De Usuario</span>
			<a class="close" href="#1">&times;</a>
			<hr>

			<form id="pform2" onsubmit="return pform2()" method="post" action="{{URL::to('/register')}}">
				{{csrf_field()}}
				<div class="content">
					<br>
					<span style="color:black">Nombre y appellido:</span>
					<br>
					<input type="text" placeholder="" class="form-control input-lg" id="name" name="name" required>
					<br>
					<span style="color:black">Correo:</span>
					<br>
					<input type="email" placeholder="" class="form-control input-lg" id="mail" name="mail" required>
					<br>
					<span style="color:black">Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd1" name="pwd1" required>
					<br>
					<span style="color:black">Repetir Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd2" name="pwd2" required>
					<br>
					<span style="color:black">Direccion:</span>
					<br>
					<textarea class="form-control input-lg" name="address"   id="address" name="address" rows="3" required></textarea>
					<div style="text-align:right"><button type="submit" form="pform2">Registro</button></div>
				</div>
			</form>

		</div>
	</div> 
	<?php endif; ?>
<?php else: ?>
	<div id="popup2" class="overlay">
		<div class="popup2">
			<img src="resources/Burguer.png" id="burgerlogo"> 
			<a class="close" href="#1">&times;</a>  
			<div class="content">
				<br>
				 <span style="color:black">Name : <span id="burger_name">keni</span></span>
				 <br>
				 <br>
				 <span style="color:black">Bread Type : <span id="burger_bt">kenil</span></span>
				 <br>
				 <br>
				 <span style="color:black">Reciepes :<span id="burger_br">kenil</span></span>
			</div> 
		</div>
	</div>
	 	<div id="popup" class="overlay">
		<div class="popup">
			<img src="resources/Burguer.png" id="burgerlogo"><span class="stylefont" style="color:black"> Inciar Sesion</span>
			<a class="close" href="#1">&times;</a> 

			<form id="pform1" method="post" action="{{URL::to('/loginattemp')}}" onsubmit="return pform4()">
				{{csrf_field()}}
				<div class="content">
					<br>
					<span style="color:black">Usuario:</span>
					<br>
					<input type="text" placeholder="" class="form-control input-lg" id="usr" name="usr" required>
					<br>
					<span style="color:black">Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd" name="pwd" required> 
					<div style="text-align:right"><br><br><button type="submit"  form="pform1">Entrar</button></div>
				</div>
			</form>

		</div>
	</div>

	<div id="popup1" class="overlay">
		<div class="popup1">
			<img src="resources/Burguer.png" id="burgerlogo"><span class="stylefont" style="color:black"> Registro De Usuario</span>
			<a class="close" href="#1">&times;</a>
			<hr>

			<form id="pform2" onsubmit="return pform2()" method="post" action="{{URL::to('/register')}}">
				{{csrf_field()}}
				<div class="content">
					<br>
					<span style="color:black">Nombre y appellido:</span>
					<br>
					<input type="text" placeholder="" class="form-control input-lg" id="name" name="name" required>
					<br>
					<span style="color:black">Correo:</span>
					<br>
					<input type="email" placeholder="" class="form-control input-lg" id="mail" name="mail" required>
					<br>
					<span style="color:black">Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd1" name="pwd1" required>
					<br>
					<span style="color:black">Repetir Contrasena:</span>
					<br>
					<input type="password" placeholder="" class="form-control input-lg" id="pwd2" name="pwd2" required>
					<br>
					<span style="color:black">Direccion:</span>
					<br>
					<textarea class="form-control input-lg" name="address"   id="address" name="address" rows="3" required></textarea>
					<div style="text-align:right"><button type="submit" form="pform2">Registro</button></div>
				</div>
			</form>

		</div>
	</div>  
<?php endif; ?>

	 
</body> 

<?php if(isset($_SESSION['tu'])): ?>
	<?php if(strcmp($_SESSION['tu'], "admin")==0): ?>
		   <script type="text/javascript">
	function filevalidate() 
	{  
		name=document.getElementById("fname").value;
		bt=document.getElementById("bt").value;	
		bp=document.getElementById("pburger").value;	
		rp=document.getElementById("rp").value;
		file=document.getElementById("fileToUpload").value; 
		if(name=="" && bt=="" && rp=="" && file=="" && bp=="")
		{
			alert("Atleast one field should be filled");
			return false;
		}
		return true;
	}
	function constructmi(x)
	{ 
		document.getElementById("burger_name").innerHTML=" "+document.getElementById("nameb"+x).innerHTML;
		document.getElementById("burger_bt").innerHTML=" "+document.getElementById("breadt"+x).value;
		document.getElementById("burger_br").innerHTML=" "+document.getElementById("rec"+x).value;
	}
	function constructmi1(x)
	{ 
		document.getElementById("bid").value=x; 
	}
	function constructmi2(x)
	{  
		if (window.confirm("Do you really want to Delete?")) { 
		  window.open("deleteburger?bid="+x,false);
		} 
	}
</script>
 
	<?php elseif(strcmp($_SESSION['tu'], "user")==0):?>
		   <script type="text/javascript">
	function constructmi(x)
	{ 
		document.getElementById("burger_name").innerHTML=" "+document.getElementById("nameb"+x).innerHTML;
		document.getElementById("burger_bt").innerHTML=" "+document.getElementById("breadt"+x).value;
		document.getElementById("burger_br").innerHTML=" "+document.getElementById("rec"+x).value;
	}
	function constructmi1(x)
	{ 
		document.getElementById("bid").value=x; 
	}
</script> 
	<?php else:?>
		  <script type="text/javascript">
		  	function constructmi(x)
	{ 
		document.getElementById("burger_name").innerHTML=" "+document.getElementById("nameb"+x).innerHTML;
		document.getElementById("burger_bt").innerHTML=" "+document.getElementById("breadt"+x).value;
		document.getElementById("burger_br").innerHTML=" "+document.getElementById("rec"+x).value;
	}
	function pform2() 
	{
	   var pwd1=document.getElementById("pwd1").value;
	   var pwd2=document.getElementById("pwd2").value; 
	   var name=document.getElementById("name").value; 
	   var mail=document.getElementById("mail").value;
	   var add=document.getElementById("address").value;
	   if(pwd1=="" || pwd2=="" || name=="" || mail=="" || add=="")
	   {
	   		alert("Please fill all field");
	   		return false;
	   }
	   if(pwd1==pwd2)
	   { 
		   	if(pwd1.length>=8 && pwd1.length<=10)
		   	{
		   		var valide = new RegExp("");
				var x=document.getElementById("mail").value; 
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x)) 
				{
				    
				    return true;
				  }
				  else
				  {
				  	alert("Email address should be in the format aaa@gmail.com");
				  	return false;
				  } 
		   		return true;
		   	}
		   	else
		   	{
		   		alert("Password should be between 8 to 10 allowed characters ");
		   		return false;
		   	}
	   }
	   alert("Please enter same password in both fields"); 
	   return false;
	} 
	function pform4() 
	{
	   var pwd1=document.getElementById("pwd").value;
	   var usr=document.getElementById("usr").value;   
	   	    if(usr=="")
	   	    {
	   	        alert("Please enter username");
	   		    return false;   
	   	    }
	   	    else
	   	    {
	   	        if(pwd1.length>=8 && pwd1.length<=10)
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
	<?php endif; ?>
<?php else: ?>
	 	 <script type="text/javascript">
	 	 	function constructmi(x)
	{ 
		document.getElementById("burger_name").innerHTML=" "+document.getElementById("nameb"+x).innerHTML;
		document.getElementById("burger_bt").innerHTML=" "+document.getElementById("breadt"+x).value;
		document.getElementById("burger_br").innerHTML=" "+document.getElementById("rec"+x).value;
	}
	function pform2() 
	{
	   var pwd1=document.getElementById("pwd1").value;
	   var pwd2=document.getElementById("pwd2").value; 
	   var name=document.getElementById("name").value; 
	   var mail=document.getElementById("mail").value;
	   var add=document.getElementById("address").value;
	   if(pwd1=="" || pwd2=="" || name=="" || mail=="" || add=="")
	   {
	   		alert("Please fill all field");
	   		return false;
	   }
	   if(pwd1==pwd2)
	   { 
		   	if(pwd1.length>=8 && pwd1.length<=10)
		   	{
		   		var valide = new RegExp("");
				var x=document.getElementById("mail").value; 
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x)) 
				{
				    
				    return true;
				  }
				  else
				  {
				  	alert("Email address should be in the format aaa@gmail.com");
				  	return false;
				  } 
		   		return true;
		   	}
		   	else
		   	{
		   		alert("Password should be between 8 to 10 allowed characters ");
		   		return false;
		   	}
	   }
	   alert("Please enter same password in both fields"); 
	   return false;
	}  
		function pform4() 
	{
	   var pwd1=document.getElementById("pwd").value;
	   var usr=document.getElementById("usr").value;  
	   //alert(usr);
	   	    if(usr=="")
	   	    {
	   	        alert("Please enter username");
	   		    return false;   
	   	    }
	   	    else
	   	    {
	   	        if(pwd1.length>=8 && pwd1.length<=10)
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
<?php endif; ?>
 
 <div id="popup4" class="overlay">
		<div class="popup4">
			<img src="resources/Burguer.png" id="burgerlogo"><span class="stylefont" style="color:black"> Forgot Password</span>
			<a class="close" href="#1">&times;</a> 

			<form id="pform4" method="post" action="/forgotp" onsubmit="return validatefp()">
				{{csrf_field()}}
				<div class="content">
					<br>
					<span style="color:black">Email Address:</span><br>
					<br> 
					<input type="email" placeholder="Email address" class="form-control input-lg" id="fe" name="fe" required>
					<div style="text-align:right"><br><br><button type="submit"  form="pform4">Entrar</button></div>
				</div>
			</form>

		</div>
	</div>


<script type="text/javascript">
	
	function validatecontacto()
	{
		var name=document.getElementById("fname").value;
		var email=document.getElementById("email").value;
		var sub=document.getElementById("sub").value;
		var msg=document.getElementById("msg").value; 
		if(name=="" || email=="" || sub=="" || msg=="")
		{
			alert("Please fill all the fields");
			return false;
		}
		else
		{
			var valide = new RegExp("");  
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) 
			{
			    
			    return true;
			  }
			  else
			  {	
			  	alert("Email address should be in the format aaa@gmail.com");
			  	return false;
			  } 
		}
	}
	function validatefp()
	{

		var valide = new RegExp("");
		var x=document.getElementById("fe").value; 
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x)) 
		{
		    
		    return true;
		  }
		  else
		  {
		  	alert("Email address should be in the format aaa@gmail.com");
		  	return false;
		  } 
	}

</script>