<?php  require "index1.php"  ?>
<!DOCTYPE html>
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
<h1>Phone Book App</h1>
<table align="center" >
<thead>
<tr>
<th colspan="4">View Contact(s) |<a href="index.html">Home<a/></th>
</tr>
<tr>
<th>ID</th><th>NAME</th><th>NUMBER</th><th>OPERATIONS</th>


<?php

$sql = "SELECT id, name, number FROM phonebook_table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id=$row["id"];
		$name=$row["name"];
		$number=$row["number"];
$row=<<< abc
 <tr>
<td>$id</td><td> $name </td><td> $number</td><td>
<form action="edit.php" method="post">
<input type="hidden" value=$id name="id">
<input type="submit" value="Edit" name="edit">
</form>


<form action="delete.php" method="post">
<input type="hidden" value=$id name="id">
<input type="submit" name="delete" value="Delete">
</form>

</td>
</tr>
abc;
echo $row;

    }
} else {
    echo "0 results";
}


?>



</tr>
</thead>

<?php echo $row;?>
<?php echo $row;?>


</table>
</div>
</body>

</html>