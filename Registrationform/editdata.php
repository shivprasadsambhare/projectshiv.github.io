<?.,,<?php


?><?php

require('connect.php');

$idu=$_GET["id"];

 $msg="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password  from form 
      
     
      
	  
	  $fname = $_POST['fname'];
      $lname = $_POST['lname']; 
	  $email = $_POST['email'];
      $location = $_POST['location'];
	  $phone = $_POST['phone'];
      	  
	 
$mob="/^[1-9][0-9]*$/"; 


	
			$q="UPDATE user SET firstname='$fname', lastname='$lname', email='$email', phone='$phone', location='$location'  WHERE id='$idu'";
			$result=mysql_query($q);
			
			$msg="Record Updated Successfully";

			   header("location:index.php");
		
		
   }
?>

<html>


<style>



body{

background: url(homeimages/home.jpg) no-repeat center center fixed;

  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
 background-size: cover;
background-color:white;
}


 .button {
    background-color: black;
    border: none;
    color: white;
    padding: 10px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
	font-style: oblique;
  //  margin: 4px 2px;
    cursor: pointer;
	border-radius: 4px;
	opacity: 0.8;
	margin-right:2cm;
margin-left:2cm;
}

.button:hover {
    background-color: #008CBA;
    color: white;
}

#header {
    background-color:black;
    color:white;
opacity: 0.6;

    
    padding:5px;
}







#frm{


background: url(homeimages/book.jpg) no-repeat center center fixed;
border-style: solid;
font-style: oblique;
///width:100%;
margin-left:12cm;
margin-top:2em;
margin-right:12cm;
 background-color: black;
// height:10cm;
 padding:5px;
// text-align:center;
 //opacity:0.8;
}


input[type=text]
{
	
	padding:2px;
	margin-top:4px;
	
}

form{
	
	margin-left:45px;
}

</style>



<body>


<div id="frm">
<center><div style = " color:black; margin-top:10px"><h3><?php echo $msg; ?></h3></div></center>

<center><h1>Update Registration Form</h1></center>


  
<form action="" method="post">

<?php

$ide=$_GET["id"];
$selectSQL = "SELECT * FROM `user` where id='$ide'";
$selectRes = mysql_query( $selectSQL );



while( $row = mysql_fetch_assoc( $selectRes ) )
{
?>


First Name:&nbsp;&nbsp;
  <input type="text" name="fname" value="<?php echo "{$row['firstname']}" ;  ?>" required><br><br>
Last Name:&nbsp;&nbsp;
  <input type="text" name="lname" value="<?php echo "{$row['lastname']}" ;  ?>" required><br>
Email:&nbsp;&nbsp;
  <input type="email" name="email"  value="<?php echo "{$row['email']}" ;  ?>" required><br>
  
 Phone No:&nbsp;&nbsp;
  <input type="text" name="phone" value="<?php echo "{$row['phone']}" ;  ?>" required><br>
  
 Location:&nbsp;&nbsp;
  <input type="text" name="location" value="<?php echo "{$row['location']}" ;  ?>" required><br><br> 

  <br>
<input type="submit" class="button" name=submit value=Update><br><br><input type="Reset"  class="button" value="Reset" >


<center><a style="text-decoration:none;" href="index.php"><h2>Home</h2></a> </center>
<?php


}
?>

</form> 

</div>


</body>
</html>