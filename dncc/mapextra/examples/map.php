<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$adr=$_POST['add'];
	$lt=$_POST['lat'];
	$ln=$_POST['long'];

	$variable = substr($adr, 0, strpos($adr, ", Dhaka"));
	echo "Address:".$variable." Lat:".$lt." Long:".$ln." .";

}
?>