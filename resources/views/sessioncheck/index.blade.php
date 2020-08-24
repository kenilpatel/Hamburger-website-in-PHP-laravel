<?php 
    ob_start();
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
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

	 	 
	 
?>