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
//"sse":"1","se":"77","sb":"-47"
//$sql="INSERT INTO `Pcount`( `W_Date`, `W_Time`, `W_Pcount`, `W_Humidity`, `W_Temperature`, `W_Store`) VALUES ("."\"$sdate\"".",\"$stime\","."$data->W_P,$data->W_H,$data->W_T,1);";
$sdate=date("Y-m-d");
$stime=date("H:i:sa");
echo $stime;
echo $sdate;


$sql="INSERT INTO `Sensordata`(`sstate`, `scname`, `scdb`, `sdata`, `stime`) VALUES ($data->sse,\"$data->se\",$data->sb".",\"$sdate\"".",\"$stime\");";

if($conn->query($sql) === TRUE){
  
	echo "newrecords succ";
}else{
echo "error:".$sql."<br>".$conn->error;
}
$conn->close();
?>