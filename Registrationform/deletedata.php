<?php

	   
require('connect.php');


$id=$_GET["id"];

 
	   
     $query = "DELETE FROM `user` WHERE id='$id'";

	        $result = mysql_query($query);

	       
	    

  
			   header("location:index.php");
		
	
?>

	    