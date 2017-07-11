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


if(isset($_POST['deposit']))
{
	
	
	$user=$_SESSION['user_id'];
	$acc=mysqli_real_escape_string($conn,$_POST['account']);
	$amount=mysqli_real_escape_string($conn,$_POST['amount']);
	$type="D";
	/*
	$stmt=$conn->prepare("INSERT INTO accounts (user_id,account_number,acount_balance) values(?,?,?)");
	$stmt->bind_param('iii',$user,$accn,$acc_b);
	$user=$_SESSION['user_id'];
	$accn=$accn;
	$acc_b=$amount;
	$stmt->execute();

	*/
	
$sql = "SELECT account_balance FROM accounts where accout_number=".$acc;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//echo "record found<br/>";
	while($row = $result->fetch_assoc()) {
	$totalamount=$row['account_balance']+$amount;
	//echo $amount;
	
	$sql="update accounts set account_balance=$totalamount where accout_number=$acc";
	
	
	if ($conn->query($sql) === TRUE) {
		//$last_id = $conn->insert_id;
		//echo "New record created successfully. Last inserted ID is: " . $last_id;
		$sql2 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,'$type',$amount,$acc)";
		if ($conn->query($sql2) === TRUE) {
			//echo"Recorded in the actvtytable";
		}else{
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		//insert into transaction activity
		//echo "Amount updated";
		header("location:http://localhost/bankSystem/checkbalance.php");
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	}
}else{
	
	
	
	
$sql = "INSERT INTO accounts (user_id, accout_number,account_balance)
VALUES ($user,$acc,$amount)";	
	
if ($conn->query($sql) === TRUE) {
	//record deposit on transactionactivity table
		//$last_id = $conn->insert_id;
		//echo "New record created successfully. Last inserted ID is: " . $last_id;
		$sql2 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,$type,$amount,$acc)";
		if ($conn->query($sql2) === TRUE) {
		}else{
			echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		
    //echo "New record created successfully<br>";
	//echo "Record deleted<br>";
	//header("location: viewContacts.php");
	//echo"Record INSERTED";
	header("location:http://localhost/bankSystem/checkbalance.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	//echo "Deposite successfully";
	
	//$val1=mysqli_real_escape_string($conn,$_POST['name']);
	
}
}

?>