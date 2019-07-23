<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'desicattle');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
if (isset($_POST['uname']) and isset($_POST['psw'])){
	
// Assigning POST values to variables.
$username = $_POST['uname'];
$password = $_POST['psw'];
if($username=="admin" && $password=="jit123")
{header("Location:http://localhost/phpmyadmin");
}
// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user` WHERE user_name='$username' and 	password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
header("Location:http://localhost/webmini/upload.html");

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}


?>