<?php
session_start();
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
//echo "Connected successfully<br>";


if(isset($_POST['login']))
{
	
	$_SESSION['name']=$_POST['name'];
	$_SESSION['password']=$_POST['password'];
	$user="peter";//$_POST['name'];
	$pass="password";$_POST['password'];
	echo  $_POST['name']."<br/>";
	echo $_POST['password']."<br/>";
	
	$sql = "SELECT user_id FROM users where name='$user'and password='$pass'";
	$result = $conn->query($sql);
	

	
	
	if ($result->num_rows > 0) {
		echo "User authenticated";
		header("location:http://localhost/bankSystem/deposit.php");
		
	}
	else
	{
		$formError="User Does not exist";
		echo $formError;
	}
	
	
	//$val1=mysqli_real_escape_string($conn,$_POST['name']);
	
}


?>