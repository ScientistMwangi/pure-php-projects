<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['delete']))
{

$id=$_POST['id'];
$sql = "delete from phonebook_table where id=$id";


if ($conn->query($sql) === TRUE) {
    
echo "Record deleted<br>";
header("location: viewContacts.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}


?>