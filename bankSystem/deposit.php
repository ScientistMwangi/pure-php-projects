<!DOCTYPE html>
<?php
session_start();
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
<h2>Deposit | <a href="operations.php">Home<a/></h2 >
<form  action="save.php" method="post" align="center">
 <fieldset>
<legend>Deposit Cash</legend>

Account:<br>
<input type="text" name="account" required length="100" value=""/>
<br>
Amount:<br>
<input type="text" name="amount" required length="100" value=""/>
<br>
<input type="submit" value="Deposit" name="deposit">

</fieldset>
</form>


</div>
</body>

</html>