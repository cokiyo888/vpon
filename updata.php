<?php
$servername = "localhost";
$username = "g04";
$password = "2017nchu_g04";
$dbname = "g04";

$data=json_decode($_GET[data],false);

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed php:" .$conn->connect_error);
}

$sql="INSERT INTO pcount(wpcount,w_humidity,w_temperature) VALUES ("$data->wpcount","$data->w_humidity","$data->w_temperature");";

if($conn->query($sql) === TRUE){
  
	echo "newrecords succ";
}else{
echo "error:".$sql."<br>".$conn->error;
}
$conn->close();
?>