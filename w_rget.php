<?php
$servername = "localhost";
$username = "g04";
$password = "2017nchu_g04";
$dbname = "g04";

echo "ggg";


//{"location":"¤¤¿³¤j¾Ç","t":"25.8"}
$data=json_decode($_GET["data"], false);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("SET NAMES 'utf8'");
//echo $data->W_P;
$sdate=date("Y-m-d");
$stime=date("H:i:sa");
echo $stime;
echo $sdate;
//$sql = "INSERT INTO `Weather`(`WID`) VALUES ($data->wid);";
$sql="INSERT INTO `Pcount`( `W_Date`, `W_Time`, `W_Pcount`, `W_Humidity`, `W_Temperature`, `W_Store`) VALUES ("."\"$sdate\"".",\"$stime\","."$data->W_P,$data->W_H,$data->W_T,1);";

if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
