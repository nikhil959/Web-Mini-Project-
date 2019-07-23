<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
.nap{
width:100%;
font-size:25px;
height:300px;
margin-top: 55px;
opacity:1;
font-family: sans-serif;
overflow: scroll;
background:#FFFFFF;
}
.naq{


width:100%;
font-size:25px;
height:60px;
margin-top:0px;
font-family: sans-serif;
opacity:0.9;
background:#FFFFFF;
}

</style>
</head>
<body>

<?php
$q = ($_GET['q']);
 

$con = mysqli_connect('localhost','root','','desicattle');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"desicattle");
$sql="SELECT * FROM upload WHERE Cows = '".$q."'";
$result = mysqli_query($con,$sql);





while($row = mysqli_fetch_array($result)) {
	$imageURL = 'uploads/'.$row["file_name"];
    echo "<div class= 'nap'>";
	echo "<img src='$imageURL'  >";

   echo "<div class= 'naq'>";
    echo "Animal Type :" . $row['Cows'] ."<br>";
    echo "Breedname :" . $row['breedname']."<br>" ;
    echo "count :" . $row['count'] ."<br>";
    echo "ownername :" . $row['ownername']."<br>" ;
    echo "Email Address :" . $row['email']."<br>" ;
	 echo "Aadharcard No :" . $row['adharcardno']."<br>" ;
	  echo "Phone Nuumber :" . $row['phonenumber']."<br>" ;
	   echo "Location :" . $row['location']."<br>" ;
	     echo "</div>";
    echo "</div>";

}
mysqli_close($con); 


?>





</body>
</html>