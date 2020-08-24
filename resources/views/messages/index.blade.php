<?php 
    ob_start();
	?>
	@include('sessioncheck.index')
	<?php
	$s=ret_session();
	$user=explode(",",$s); 
	if(isset($_SESSION['sentmail']))
	{
		if($_SESSION['sentmail']==0)
		{
			echo '<script>alert("Mail successfully sent")</script>';
			
		} 
		
	}

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<head>
	<title>Messages</title>
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
    	if(isset($_SESSION['sentmail']))
    	{ 
    		if($_SESSION['sentmail']==0)
    		{ 
    			echo "<noscript><h4 style='text-align:center;'>"."Mail successfully sent"."</h4></noscript>"; 
    			$_SESSION['sentmail']=1;
    		} 
    		
    	}
    ?>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="menu" class="tl">Hamburgers</a>
	  <a href="Edita" class="tl">Shop Info</a>
	  <a href="message" style="color:red;" class="tl">Messages</a>
	  <a href="editpassword_admin" class="tl">Change password</a> 
	  <a href="logout" class="tl">Logout</a>  
	</div>


	 <div class="chome darken text">
		<div class="topnav" id="myTopnav">
			<a><img src="resources/5.png" id="logo"></img></a>
			 
			<a  href="index">INCIO</a>
			<a  href="sobre_nosotros">SOBRE NOSOTROS</a>
			<a  href="menu">MENU</a>
			<a href="http://txp9131.uta.cloud/blog/">BLOG</a>
			<a  href="contacto" >CONTACTO</a> 
		   	<a href="inicio" ><?php echo $user[1]; ?></a>
		   	<a href="logout" class="tl">LOGOUT</a>  
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		  </a>
		</div>

		<div class="triangle1"></div>
		<div class="wrapperincio1_message">  
			<br>
			<br>

			<button onclick="openNav()">Open admin Pannel</button>
		</div>
		<div class="triangle2"></div>
	</div>

	<div class="wrappermiddleu" id="recentm">
			<h1>Recent Messages</h1>   
			 <?php
			 	 $count=0;
					?>
						@foreach($forms as $row)
						<figure class='border'>
					    <img src='resources/burguer.png' class='menuimg'>
					    <hr>
					    <figcaption class='lefts' style='text-align:center;'> 
					      <h3>Name : <span id=n<?php echo $count; ?>>{{$row['name']}}</span></h3> 
					      <h3>Email : <span id=e<?php echo $count; ?>>{{$row['email']}}</span></h3> 
					      <h3 style='text-align:center;'>Sub : <span id=s<?php echo $count; ?>>{{$row['subject']}}</span></h3> 
					      <h3 style='text-align:center;'>Message : <span id=m<?php echo $count; ?>>{{$row['message']}}</span></h3> 
					      <a href='#popup1' onclick='constructreply(<?php echo $count; ?>)'><button>Reply</button></a>
					    </figcaption>
					 	</figure>
					 	<?php $count=$count+1; ?>
						@endforeach
					<?php 
				if($count==0)
				{
					echo "<br><h1 class='simple' style='font-size:20px;	'>No new messages</h1>";
				}
			 ?>
			
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
	<div id="popup1" class="overlay">
		<div class="popup1">
			<img src="resources/Burguer.png" id="burgerlogo">
			<a class="close" href="#1">&times;</a> 
			<form id="pform1" method="post" action="mail" onsubmit="return validateadmin()">
				{{csrf_field()}}
			<div class="content"> 
				<span style="color:black">Customer Email:</span>
				<br> 
				<input type="email" name="cemail" id="cemail" readonly required>
				<br>
				<br>
				<span style="color:black">Subject:</span>
				<br> 
				<input type="hidden" name="cmsg" id="cmsg">
				<input type="text" name="csub" id="csub" readonly required>
				<br>
				<br>
				<span style="color:black">Message:</span>
				<br> 
				<textarea placeholder="Message" id="amsg" name="amsg" rows="10" required></textarea>
				<div style="text-align:right"><br><br><button type="submit"  form="pform1">Reply</button></div>
			</div>
			</form>
		</div>
	</div>

	 
</body> 

<script type="text/javascript">
	function constructreply(x) 
	{
	  idg1="n"+x;
	  idg2="e"+x;
	  idg3="s"+x;
	  idg4="m"+x;
	  name=document.getElementById(idg1).textContent;
	  email=document.getElementById(idg2).textContent;
	  sub=document.getElementById(idg3).textContent;  
	  message=document.getElementById(idg4).textContent; 
	  document.getElementById("cemail").value=email;
	  document.getElementById("csub").value=sub;
	  document.getElementById("cmsg").value=message;
	}
	function validateadmin()
	{
		email1=document.getElementById("cemail").value;
		sub1=document.getElementById("csub").value;	
		message1=document.getElementById("cmsg").value;
		msg=document.getElementById("amsg").value;
		if(email1=="" || sub1=="" || message1=="" || msg=="")
		{
			alert("All field should be filled");
			return false;
		}
		return true;
	}
</script>