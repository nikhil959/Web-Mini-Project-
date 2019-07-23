<?php

	 
 
  

$statusMsg = '';
$Cows=filter_input(INPUT_POST, 'Cows');

 $breedname=filter_input(INPUT_POST,'breedname');
 $count=filter_input(INPUT_POST,'count');
 $ownername=filter_input(INPUT_POST,'ownername');
  $email=filter_input(INPUT_POST,'email');
   $adharcardno=filter_input(INPUT_POST,'adharcardno');
    $phonenumber=filter_input(INPUT_POST,'phonenumber');
	 $location=filter_input(INPUT_POST,'location');

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
			$host="localhost";
					 $dbusername="root";
					 $dbpassword="";
					 $dbname="desicattle";
					 //create connection
					 $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
            // Insert image file name into database
            $insert = $conn->query("INSERT into upload (Cows,breedname,count,ownername,email,adharcardno,phonenumber,location,file_name)
			VALUES ('$Cows','$breedname','$count','$ownername','$email','$adharcardno','$phonenumber','$location','".$fileName."')");
            if($insert){
                $statusMsg = "The Details has been inserted successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo "<script type='text/javascript'>alert('$statusMsg');</script>";
header("Location:http://localhost/webmini/upload.html");












?>