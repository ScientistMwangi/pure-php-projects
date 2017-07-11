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


if(isset($_POST['transfer']))
{
	
	
	$user=$_SESSION['user_id'];
	$from_acc=mysqli_real_escape_string($conn,$_POST['from_acc']);
	$to_acc=mysqli_real_escape_string($conn,$_POST['to_acc']);
	$amount=mysqli_real_escape_string($conn,$_POST['amount']);
	
	echo" from acc:".$from_acc." To acc:".$to_acc."Amount: ".$amount."<br/>";
	/*
	$stmt=$conn->prepare("INSERT INTO accounts (user_id,account_number,acount_balance) values(?,?,?)");
	$stmt->bind_param('iii',$user,$accn,$acc_b);
	$user=$_SESSION['user_id'];
	$accn=$accn;
	$acc_b=$amount;
	$stmt->execute();

	*/
	
$sql = "SELECT account_balance FROM accounts where accout_number=$from_acc";
//$result = $conn->query($sql);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$camount=$row["account_balance"];
		//echo $camount;
		
}}
if($amount>0){
	
if($camount<$amount)
		{
			echo"Error: You cannot transfer more than you have";
		}
else{
$sql = "SELECT account_balance FROM accounts where accout_number=$to_acc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$addedamount=$row['account_balance'];
	//echo$addedamount."<br/>";
}}


	$addedamount=$addedamount+$amount;
	$removedamount=$camount-$amount;
	//echo $addedamount."Total Amount<br/>";
	$sql="update accounts set account_balance=$removedamount where accout_number=$from_acc";
	$sql2="insert into transfer(to_acc,from_acc,amount,user_id) values($to_acc,$from_acc,$amount,$user)";
	//$conn->multi_query($sql);
	//$conn->query($sql3);
	$sql3="update accounts set account_balance=$addedamount where accout_number=$to_acc";
	$type1="T";
	$sql4 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,'$type1',$amount,$from_acc)";
	$type2="D";
	$sql5 = "INSERT INTO transactionactivity (refrence_id, type,amount,affected_account)
		VALUES ($user,'$type2',$amount,$to_acc)";
		
	//deposit to the specific accout
	
	
	$conn->query($sql);
	$conn->query($sql2);
	$conn->query($sql3);
	$conn->query($sql4);
	if ($conn->query($sql5) === TRUE) {
		//echo "Amount updated";
		header("location:http://localhost/bankSystem/reverse.php");
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





}
}
else
{
	echo"Enter correct amount<br/>";
}
}
?>