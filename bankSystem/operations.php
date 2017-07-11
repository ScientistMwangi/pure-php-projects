<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<style type="text/css">
table,td {

border-collapse: collapse;

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
<title>Phone Book Application</title>
</head>
<body>

<div id="content">
<a href="logout.php" align="right-side"><?php echo $_SESSION['name']?>|Logout</a>
<h1>Simple Bank App</h1>
<table align="center" >
<tr>
<th>Operations</th>
</tr>
<tr><td><a href="deposit.php">Deposit</a></td></tr>
<tr><td><a href="checkbalance.php">CheckBalance</a></td></tr>
<tr><td><a href="transfer.php">Transfer Money</a></td></tr>
<tr><td><a href="reverse.php">Reverse Transaction</a></td></tr>
<tr><td><a href="statementSelectAcc.php">Transaction Stament</a></td></tr>
</table>
</div>
</body>

</html>