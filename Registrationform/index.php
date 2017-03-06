<?php


?><?php

require('connect.php');



 $msg="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password  from form 
      
     
      $uname = $_POST['uname']; 
	  $pass = $_POST['pass']; 
	  $pass2=$_POST['pass2']; 
	  $fname = $_POST['fname'];
      $lname = $_POST['lname']; 
	  $email = $_POST['email'];
      $location = $_POST['location'];
	  $phone = $_POST['phone'];
      	  
	 
$mob="/^[0-9]{10}+$/"; 
$query="select * from user where username='$uname'";
		 $res=mysql_query($query);
		$numrows=mysql_num_rows($res);

if(!preg_match($mob, $phone))
	{ 
		$msg="Please enter a valid number";
	}
	
		
	else if($pass!=$pass2)
		{
			$msg="Please Check Password";
		}
		
		
		

	
	  
	  
		
		else if($numrows!=0)
		{
			$msg="Username Already Exist";

			
		}
	
		else{
			
			$q="insert into user (firstname,lastname,email,phone,location,username,password)values('$fname','$lname','$email','$phone','$location','$uname','$pass')";
			$result=mysql_query($q);
			
			$msg="Record Added Successfully";
		}
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



input[type=text]
{
	
	padding:2px;
	margin-top:4px;
	
}

form{
	
	margin-left:45px;
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



table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}


#board{

 padding:50px;	

width:80%;
text-align:justify; 
}



#post{
    width:1010px;
    float:left;
   
background-color:black;
opacity:0.6;	
   
}




</style>



<body>


<div id="frm">

<center><h1>Registration Form</h1></center>


  
<form action="" method="post">


  
Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="uname" placeholder=username required><br>

Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="pass" required><br>
Confirm Password:
  <input type="password" name="pass2" required><br><br>


First Name:&nbsp;&nbsp;
  <input type="text" name="fname" placeholder=FirstName required><br>
Last Name:&nbsp;&nbsp;
  <input type="text" name="lname" placeholder=LastName required><br>
Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="email" name="email" placeholder=FullName required><br>
  
 Phone No:&nbsp;&nbsp;
  <input type="text" name="phone" placeholder=Phone required><br>
  
 Location:&nbsp;&nbsp;
  <input type="text" name="location" placeholder=Location required><br>
<center><div style = " color:Red; margin-top:10px"><h3><?php echo $msg; ?></h3></div></center>

 
<input type="submit" class="button" name=submit value=Submit><br>
<br><input type="Reset"  class="button" value="Reset" ></form> 

</form> 

</form>

</div>
<div id="board">
<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Email</th>
    <th>Phone</th>
    <th>Location</th>
    <th>Option</th>
  </tr>


<?php


$selectSQL = "SELECT * FROM `user`";
$selectRes = mysql_query( $selectSQL );



while( $row = mysql_fetch_assoc( $selectRes ) )
{

       


 ?>
 <tr>

  
    <td> <?php echo "{$row['firstname']}" ; ?> </td>
	<td> <?php echo "{$row['lastname']}" ; ?> </td>
	<td> <?php echo "{$row['email']}" ; ?> </td>
	<td> <?php echo "{$row['phone']}" ; ?> </td>
	<td> <?php echo "{$row['location']}" ; ?> </td>
	
    <td><?php   echo" <a href=editdata.php?id={$row['id']}>Edit</a>";echo '<br>';  
 echo" <a href=deletedata.php?id={$row['id']}>Delete</a>"; echo '<br>';  
 ?>
 </td>
 </tr>
 
 
    <?php


}
?>

  
  
</table>

 

 








</div>


</body>
</html>