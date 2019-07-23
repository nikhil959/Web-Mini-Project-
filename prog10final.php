<?php
class emp
{
    public $ssn;
    public $name;
    public $addr;
    public function __construct($a,$b,$c)
    {
        $this->ssn=$a;
        $this->name=$b;
        $this->addr=$c;
    }
}


$data=array();
// Create connection
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost","root","","test");

echo nl2br("\n");

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else echo "successfull connection \n";

echo nl2br("\n");

/*
$sql = "INSERT INTO EMP (SSN,NAME,ADDR)VALUES ('123', 'Doe', 'john@example.com')";
if (mysqli_query($conn,$sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

echo nl2br("\n");

$sql = "SELECT * FROM EMP";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
        //echo "SSN: " . $row["SSN"]. " Name: " . $row["NAME"]. " Addr: " . $row["ADDR"]. "<br>";
        $s1=array($row["SSN"],$row["NAME"],$row["ADDR"]);
        $data[]=$s1;
       // print_r($data);
        echo "<br/>";
        }
} 

else 
{
    echo "0 results";
}
echo "Before Sorting";
echo nl2br("\n\n");
 print_r($data);       



function selection_sort($data)
{
for($i=0; $i<count($data)-1; $i++) {
    $min = $i;
    for($j=$i+1; $j<count($data); $j++) {
        if ($data[$j][0]<$data[$min][0]) {
            $min = $j;
        }
    }
    $data = swap_positions($data, $i, $min);
    
}
print_r($data);
}

function swap_positions($data1, $left, $right) {
    $temp = $data1[$right];
    $data1[$right] = $data1[$left];
    $data1[$left] = $temp;
    return $data1;
}


 

//print_r($data);
//echo "<br/>SSN: " .$data[1][0];


// echo nl2br("\n");
 echo"After Sorting:";
 echo nl2br("\n");
  echo nl2br("\n");
selection_sort($data);

// $size = count($std);
// foreach ($std as $a) {
    

// //apply selection sort here!!!!

//    // echo $a->ssn." ".$a->name ." ".$a->addr;
//     echo nl2br("\n");
    
// }
// print_r($data);
mysqli_close($conn);
?> 
