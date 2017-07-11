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


if(isset($_POST['save']))
{
	//echo "name ".$_POST['name']."<br>";
	//echo "number ".$_POST['number']."<br>";
$val1=mysqli_real_escape_string($conn,$_POST['name']);
$val2=mysqli_real_escape_string($conn,$_POST['number']);
	
$sql = "INSERT INTO phonebook_table (name, number)
VALUES ('$val1',$val2)";	
	
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully<br>";
	//echo "Record deleted<br>";
	header("location: viewContacts.php");
	echo"Record INSERTED";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
if(isset($_POST['edit']))
{

$id=$_POST['id'];
$val1=mysqli_real_escape_string($conn,$_POST['name']);
$val2=mysqli_real_escape_string($conn,$_POST['number']);	
$sql = "update phonebook_table SET name='$val1',number=$val2 where id=$id";
//update phonebook_table set name='kibuika',number=45649845 where id=7;
if ($conn->query($sql) === TRUE) {
    
	header("location: viewContacts.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


echo $val1." ".$val2." ".$id;
	
}


?>