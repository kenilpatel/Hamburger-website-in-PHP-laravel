<?php 
    ob_start();
    ?>
	@include('sessioncheck.index')
	<?php
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
	  <a href="menu" class="tl" >Hamburgers</a>
	  <a href="Edita" style="color:red;" class="tl">Shop Info</a>
	  <a href="messages" class="tl">Messages</a> 
	  <a href="editpassword_admin" class="tl">Change password</a>
	  <a href="Logout" class="tl">Logout</a>  
	</div>


	 <div class="contacto darken text">
		<div class="topnav" id="myTopnav">
			<a><img src="resources/5.png" id="logo"></img></a>
			 
			<a  href="inicio">INCIO</a>
			<a  href="sobre_nosotros">SOBRE NOSOTROS</a>
			<a  href="menu">MENU</a>
			<a href="http://txp9131.uta.cloud/blog/">BLOG</a>
			<a  href="contacto" >CONTACTO</a> 
		   	<a href="inicio"><?php echo $user[1]; ?></a>
		   	<a href="logout" class="tl">LOGOUT</a>  
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		  </a>
		</div>

		<div class="triangle1"></div>
		<div class="wrapperincio1_message">  
			<br>
			<br>

			<button onclick="openNav()">Open Admin Pannel</button> 
		</div>
		<div class="triangle2"></div>
	</div>

	<div class="middlewrapper">
			<img src="resources/Burguer.png" id="burgerlogo"></img>
				<h1 class="hola">Edit Shop Info</h1>
			<form class="form1" id="form1" onsubmit="return form1()" action="updateshop" method="post" >
				{{csrf_field()}}
		 	<div class="row"> 
		      <div class="col-75">
		        <input type="text" id="email" name="email" placeholder="E-mail">
		        
		      </div>
		      <div class="col-75">
		        <input type="number" id="tel" name="tel" placeholder="Telephone">
		        <br>
		      </div> 
		      <div class="col-75">
		        <textarea name="address" id="add" rows="8" placeholder="Address"></textarea>
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
	  var x1=document.getElementById("email").value;
	  var x2=document.getElementById("tel").value;
	  var x3=document.getElementById("add").value; 
	  if (x1 == "" && x2 == "" && x3 == "") 
	  {
	    alert("Atleast one field must be filled out");
	    return false;
	  }
	  else
	  {
	  	if(x1!="")
	  	{
	  		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x1)) 
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
	}

</script>

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