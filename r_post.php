<?php
$servername = "localhost";
$username = "g00";
$password = "2017nchu_g00";
$dbname = "g00";

//{"location":"中興大學","t":"25.8"}
$data=json_decode(file_get_contents('php://input'), false);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("SET NAMES 'utf8'");

$sql = "INSERT INTO data (location, t,at_datetime) VALUES ('".$data->location."', ".$data->t.",now());";

if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
