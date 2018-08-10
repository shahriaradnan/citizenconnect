<?php
include 'includes/conf.php';

if (isset($_POST['change'])) {

  	
$rpid=$_POST['id'];
$rpstat= $_POST['reportstat'];
$rpcmnts= $_POST['comment'];

$rpInsp=$_POST['asgnd_insp'];

	$rpStatus=mysqli_query($dbc,"INSERT INTO 
      report_status(report_id_fk,status,status_notes,assigned_ins_id,stat_change_time) 
      VALUES
      ('$rpid','$rpstat','$rpcmnts','$rpInsp',NOW())");

	$rpAssignment=mysqli_query($dbc,"INSERT INTO 
      task_assignment(report_id_fk,assigned_ins_id,time_of_assignment) 
      VALUES 
      ('$rpid','$rpInsp','$rpcmnts',NOW())");



	if ($rpStatus) {
    //echo $message;
		// echo $rpid, $rpstat, $rpcmnts,$rpInsp,"Yes";
		# code...
		#echo "Update Successfull.Go<a href='allagents.php'>Back</a>";
?>
		<script>
		alert('Successfully Updated');
    window.location.href='reportpage.php?id='+<?php echo $rpid; ?>;
    
        </script>
<?php
	}else{
    // echo "No";
?>
		<script>

		alert('Unsuccessful!Something Went Wrong');
     window.location.href='allreports.php';
        </script>
<?php
	}


}

?>