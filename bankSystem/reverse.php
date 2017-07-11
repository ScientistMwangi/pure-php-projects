<!DOCTYPE html>
<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
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
<title>Bank System Application</title>
</head>
<body>
<div id="content">
<h1>Simple Bank App</h1>
<a href="logout.php" align="right-side"><?php echo $_SESSION['name']?>|Logout</a>
<h2 align="center"><a href="operations.php">Home<a/></h2>
<table align="center" >
<thead>
<tr>
<th colspan="4">Reverse Transaction(s)  </th>
</tr>
<tr>
<th>From Account</th><th>To Account </th><th> Amount </th><th>Reverse</th>


<?php

$sql = "SELECT *  FROM transfer where status=1 and user_id=".$_SESSION['user_id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//print right now time and date
		$now = date('Y-m-d H:i:s');
		$mintPassed = ceil((strtotime($now) - strtotime($row['time_stamp']))/60);
		$amount=$row['amount'];
		$from_acc=$row['from_acc'];
		$to_acc=$row['to_acc'];
		$activity_id=$row['activity_id'];
		
		if($mintPassed>5)
		{
			$reverse="N/A: ".$mintPassed;
		}
		else{
$reverse=<<<abc
<a href="testget.php?from_acc=$from_acc&to_acc=$to_acc&amount=$amount&activity_id=$activity_id">Reverse: $mintPassed</a>
abc;
		}

		//echo"From DB Results in Mints: ".ceil($seconds/60);
		echo "<tr><td>".$row['from_acc']."</td><td>".$row['to_acc']."</td><td>".$row['amount']."</td><td>".$reverse."</td></tr>";
		
	}
	
	
}

//echo "Right now: ".$now." ".$row['time_stamp'];

?>



</tr>
</thead>

<?php //echo "$row";?>
<?php //echo "$row";?>


</table>
</div>
</body>

</html>