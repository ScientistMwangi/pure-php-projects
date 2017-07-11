<?php  require "index1.php"  ?>
<!DOCTYPE html>
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
<title>Phone Book Application</title>
</head>
<body>
<div id="content">
<h1>Phone Book App</h1>
<h2>Edit Contact  |<a href="index.html">Home<a/></h2 >


<?php
if(isset($_POST['edit'])){
//echo" id ".$_POST['id'];
$id=$_POST['id'];

$sql = "SELECT id, name, number FROM phonebook_table where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id=$row["id"];
		$name=$row["name"];
		$number=$row["number"];
		
		//echo " ".$id." ".$name." ".$number;
		//$value="Samuel Mwangi";
	}
	
		
}
}
?>		
<form  action="createEdit.php" method="post" align="center">
 <fieldset>
<legend>Edit</legend>

Name:<br>
<input type="text" name="name" value="<?php echo $name; ?> " maxlength="100" />
<br>
Number:<br>
<input type="number" name="number" value=<?php echo $number; ?> maxlength="12"/>
<br>

<input type="hidden" name="id" value=<?php echo $id; ?> />
<br>
<input type="submit" value="Save" name="edit"/>


</fieldset>
</form>


</div>
</body>

</html>