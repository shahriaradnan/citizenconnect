<?php
include 'includes/conf.php';
include "smsGateway.php";
if (isset($_POST['change'])) {

  	
$rpid=$_POST['id'];
$rpInsp=$_POST['asgnd_insp'];
$smsGateway = new SmsGateway('ssadnan1005@gmail.com', 'salman14');

$deviceID = 23893;
$sql2="SELECT * FROM inspectors WHERE ins_id='".$rpInsp."'";
                          $sql2res=mysqli_query($dbc,$sql2);
                          $sql2fetch=mysqli_fetch_array($sql2res);
                       //   echo $sql2fetch['ins_name']." [".$sql2fetch['ins_phone']."]"; 
 $sql3="SELECT * FROM submission WHERE report_id='".$rpid."'";
 $sql3res=mysqli_query($dbc,$sql3);
  $sql3fetch=mysqli_fetch_array($sql3res);

$id=$sql3fetch['report_id'];
$prob=$sql3fetch['specific_prob'];
$wrd=$sql3fetch['ward_no'];

$dAdr=$sql3fetch['address_details'];
$mapAd=$sql3fetch['map_addr'];

$number = $sql2fetch['ins_phone'];
$message ="#ID:".$id."\r\nWard No:".$wrd."\r\nProblem:".$prob.";\r\nAddress:".$dAdr.",".$mapAd;


//Please note options is no required and can be left out
$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
// header('Location: reportpage.php?id='.$_POST['id']);
?>
<script>
		alert('SMS inroute!');
    	window.location.href='reportpage.php?id='+<?php echo $rpid;?>;
</script>
<?php
}else{
	echo "Access Denied";
}
?>
		