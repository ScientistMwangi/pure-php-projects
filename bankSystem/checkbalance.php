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
table,td {

border-collapse: collapse;
padding:10px;
}
table, th, td {
    border: 1px solid black;
}


h1{
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
<title>Simple Bank Application</title>
</head>
<body>
<div id="content">
<h1>Simple Bank App</h1>
<a href="logout.php" align="right-side"><?php echo $_SESSION['name']?>|Logout</a>
<h2 align="center"><a href="operations.php">Home<a/></h2>
<table align="center" >
<thead>
<tr>
<th colspan="4">Bank Account(s) Balance </th>
</tr>
<tr>
<th>NAME</th><th>Account Number</th><th>Amount</th>
</tr>
</thead>

<?php
//echo $_SESSION['user_id'];
$sql = "SELECT accout_number, account_balance  FROM accounts where user_id=".$_SESSION['user_id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$account_number=$row["accout_number"];
		$account_balance=$row["account_balance"];
		
		
		echo"<tr><td>".$_SESSION['name']."</td><td> ".$account_number." </td><td>". $account_balance."</td></tr>";
	}
}
	else
	{
		echo "No row found";
	}
?>




<?php //echo "$row";?>
<?php //echo "$row";?>


</table>
</div>
</body>

</html>