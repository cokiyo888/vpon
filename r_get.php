<?php
$servername = "localhost";
$username = "g04";
$password = "2017nchu_g04";
$dbname = "g04";

//{"location":"中興大學","t":"25.8"}
$data=json_decode($_GET["data"], false);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("SET NAMES 'utf8'");

//$sql = "INSERT INTO `Weather`(`WID`) VALUES ($data->wid);";
$sql="INSERT INTO `pcount` (`w_pcount`,`w_humidity`,`w_temperature`) VALUES ($data->w_pcount.,$data->w_humidity,$data->w_temperature);";

if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
