
<!DOCTYPE html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksystem";
$formError="";

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
	$user=$_POST['name'];
	$pass=$_POST['password'];
	//echo  $_POST['name']."<br/>";
	//echo $_POST['password']."<br/>";
	
	$sql = "SELECT user_id FROM users where name='$user'and password='$pass'";
	$result = $conn->query($sql);
	

	
	
	if ($result->num_rows > 0) {
		//echo "User authenticated";
		 while($row = $result->fetch_assoc()) {
		$id=$row["user_id"];
		
		//echo " ".$id." ".$name." ".$number;
		//$value="Samuel Mwangi";
	}
		$_SESSION['user_id']=$id;
		header("location:http://localhost/bankSystem/operations.php");
		
	}
	else
	{
		$formError="User Does not exist";
		//echo $formError;
	}
	
	
	//$val1=mysqli_real_escape_string($conn,$_POST['name']);
	
}


?>
<html>
<head>
<style type="text/css">



h1,h2{
text-align: center;
}

#content{
background-color:white;

margin:100px;
}
body {
    background-color: lightblue;
}
</style>
<meta charset="UTF-8">
<title>Simple Bank App</title>
</head>
<body>
<div id="content">
<h1>Simple Bank App</h1>
<h2>Login </h2 >
<form  action="login.php" method="post" align="center">
 <fieldset>
<legend>Login To Perform Transactions</legend>

Name:<br>
<input type="text" name="name" required length="100" value=""/>
<br>
Password:<br>
<input type="password" name="password" required length="100" value=""/>
<br>
<input type="submit" value="Login" name="login">
<br>
<?php echo $formError; ?>
</fieldset>
</form>


</div>
</body>

</html>