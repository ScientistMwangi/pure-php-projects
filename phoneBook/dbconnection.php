<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

/*

$sql = "SELECT id, name, number FROM phonebook_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["number"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

/*$sql = "INSERT INTO phonebook_table (name, number)
VALUES ( 'Samuel Mwangi', 0716084907)";
*/
/*$sql = "delete from phonebook_table where id=1";*/


/*$sql = "update phonebook_table SET name='Susan Akinyi',number=2457845795 where id=2";
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully<br>";
	//echo "Record deleted<br>";
	echo"Record Update";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/




$conn->close();
?>