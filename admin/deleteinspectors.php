<?php
include 'includes/conf.php';
if(isset($_GET['ins_id']))
{
	//$res=mysqli_query($dbc,"SELECT ag_pic FROM agents WHERE ag_id=".$_GET['remove_id']);
	//$row=mysqli_fetch_array($res);
	mysqli_query($dbc,"DELETE FROM inspectors WHERE ins_id=".$_GET['ins_id']);
	//$removePic="agentPic/".$row['ag_pic'];
	//unlink($removePic);
	header("Location: allinspectors.php");
}
?>