
<!DOCTYPE html>
<?php
session_start();
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
<title>Phone Book Application</title>
</head>
<body>
<div id="content">
<h1>Simple Bank App</h1>
<a href="logout.php" align="right-side"><?php echo $_SESSION['name']?>|Logout</a>
<h2 align="center"><a href="operations.php">Home<a/></h2>
<table align="center" >
<thead>
<tr>
<th colspan="4">Balance Statement: Account_Number </th>
</tr>
<tr>
<th>Date</th><th>Type</th><th>Amount</th><th>Balance</th>


<?php

?>



</tr>
</thead>

<?php echo "$row";?>
<?php echo "$row";?>


</table>
</div>
</body>

</html>