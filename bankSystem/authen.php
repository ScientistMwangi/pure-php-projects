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
echo "Connected successfully<br>";

/*
if(isset($_POST['submit']))
{
	echo $_POST['name']."<br/>";
	echo $_POST['password']."<br/>";
	
}
*/

?>