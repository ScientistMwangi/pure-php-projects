<?php
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



$sql = "SELECT accout_number, account_balance  FROM accounts where accout_number=1 and user_id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	echo"Resluts";
	$results = $result->fetch_assoc();
    echo($results);
}
	else
	{
		$results=array ("Results"=>"No row found");
		
	}
	
?>