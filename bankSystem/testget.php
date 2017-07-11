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
if($_SERVER['REQUEST_METHOD']=="GET")
{
$from_acc=$_GET['from_acc'];
$to_acc=$_GET['to_acc'];
$amount=$_GET['amount'];
$activity_id=$_GET['activity_id'];
$user=$_SESSION['user_id'];

echo "From Acc".$from_acc."To Acc  ".$to_acc."Amount  ".$amount ."Activity id".$activity_id."<br/>";


$sql = "SELECT account_balance FROM accounts where accout_number=$to_acc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$addedamount=$row['account_balance']-$amount;
	//echo$addedamount."<br/>";
}}


$sql = "SELECT account_balance FROM accounts where accout_number=$from_acc";
//$result = $conn->query($sql);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$camount=$row["account_balance"]+$amount;
		//echo $camount;
		
}}




	
	//$removedamount=$camount-$amount;
	//echo $addedamount."Total Amount<br/>";
	$sql="update accounts set account_balance=$camount where accout_number=$from_acc";
	
	$sql2="update transfer set status=0 where activity_id=$activity_id";
	//$conn->multi_query($sql);
	//$conn->query($sql3);
	$sql3="update accounts set account_balance=$addedamount where accout_number=$to_acc";
	
	
	$type1="+R";
	$sql4 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,'$type1',$amount,$from_acc)";
	$type2="-R";
	$sql5 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,'$type2',$amount,$to_acc)";
		
	//deposit to the specific accout
	
	
	$conn->query($sql);
	$conn->query($sql2);
	$conn->query($sql3);
	$conn->query($sql4);
	$conn->query($sql5);
	if ($conn->query($sql3) === TRUE) {
		echo "Amount updated";
		header("location:http://localhost/bankSystem/checkbalance.php");
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

?>