<?php
session_start();
$t=time();
echo($t . "<br>");
echo("Time".date("Y-m-d",$t))."<br/>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksystem";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT *  FROM transfer where status=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo"Time".$row['time_stamp']." to_acc".$row['to_acc']."from_acc".$row['from_acc']." Amount: ".$row['amount']."<br/>";
		$date = date('Y-m-d H:i:s');
		$seconds = strtotime($date) - strtotime($date);//$row['time_stamp']
		echo"Minus results: ".$seconds."<br/>";
		
		

		echo"CURRENT DATETIME: ".$date."<br/>";

		echo"From DB Results in Mints: ".ceil($seconds/60);
	}
}

/*$date = new DateTime();
echo"Date Time php".$date->format('U = Y-m-d H:i:s') . "\n";

$today = new DateTime();
$newdate = new DateTime();
$s = $today->diff($newdate);
*/
//echo "Date different ".$s." today: ".$today;
$newdate = new DateTime();
echo "DateConversion :".$newdate->format('Y-m-d H:i:s')."<br/>";
$seconds = strtotime('2009-10-05 18:11:08') - strtotime('2009-10-05 18:07:13');

echo"Results in seconds: ".ceil($seconds/60);

/*
$sql ="SELECT * FROM transfer where user_id=1";//.$_SESSION['user_id'];

if ($conn->query($sql) === TRUE) {
		while($row = $result->fetch_assoc()) {
			echo"Fetch Activity";
	//$amount=$row['account_balance']+$amount;
		//echo"Time".$row['time_stamp']." to_acc".$row['to_acc']."from_acc".$row['from_acc']." ".$row['amount']."<br/>";
		//header("location:http://localhost/bankSystem/checkbalance.php");
}
}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

*/





?>