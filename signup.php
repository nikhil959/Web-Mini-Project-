<?php

$user_name=filter_input(INPUT_POST, 'user_name');
 $e_mail=filter_input(INPUT_POST,'e-mail');
  $phone_number=filter_input(INPUT_POST,'phone_number');
   $password=filter_input(INPUT_POST,'password');
 if(!empty($user_name)){
	 if(!empty($e_mail)){
		 if(!empty($phone_number)){
			 if(!empty($password)){
		 $host="localhost";
					 $dbusername="root";
					 $dbpassword="";
					 $dbname="desicattle";
					 //create connection
					 	 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
					 if(mysqli_connect_error()){
						 die('connect error('.mysqli_connect_errno().')'
						 .mysqli_connect_error());
					 }
					 else{
						 $sql="INSERT INTO user(user_name,e_mail,phone_number,password)
					 values('$user_name','$e_mail','$phone_number','$password')";
					 if($conn->query($sql))
					 {
						 $successful="Account created Successfully";
						echo "<script type='text/javascript'>alert('$successful');</script>";

						header("Location:http://localhost/webmini/home.html");
						
					 }
					 else{echo "error:"."<dbr>".$conn->error;
					 }
					 $conn->close();
					 }
			 }
		 
	 
 
	 	 else{
					 echo "gym_type should not be empty";
					 die();
				 }
 }
			 
			 else{
					 echo "gym_id should not be empty";
					 die();
		 }
	 }
		  else{
					 echo "gym_type should not be empty";
					 die();
				 }
 }
				  else{
					 echo "gym_type should not be empty";
					 die();
				 }









?>