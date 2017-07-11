
<!DOCTYPE html>
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
<a href="logout.php" align="right-side"><?php echo $_SESSION['name']?>|Logout</a>
<h2>Check Account Statement | <a href="operations.php">Home<a/></h2 >
<form  action="transactionstatement.php" method="get" align="center">
 <fieldset>
<legend>Select Account to get Statement</legend>

Account Number:<br/><br/>
<select name="from_acc">

<?php
$sql = "SELECT accout_number  FROM accounts where user_id=".$_SESSION['user_id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$account_number=$row["accout_number"];
		
		
		
		echo "<option>".$account_number."<option/>";
	}
}
	else
	{
		echo "No row found";
	}


?>


</select>

<br/>
<br/>
<input type="submit" name="check" value="Check">
</fieldset>
</form>


</div>
</body>

</html>