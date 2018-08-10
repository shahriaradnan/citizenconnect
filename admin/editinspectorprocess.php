<?php
include 'includes/conf.php';
?>
<?php
if (isset($_POST['change'])) {
  	
  	$insid=$_POST['insId'];
  	$insname= $_POST['insName'];
	  $asWard=$_POST['asWard'];
	  $insnid =$_POST['insNid'];
    $insphn=$_POST['insPhn'];

	$insUpdate=mysqli_query($dbc,'UPDATE inspectors SET 
		ins_name="'.$insname.'", 
		ins_ward="'.$asWard.'", 
		ins_nid="'.$insnid.'",
    	ins_phone="'.$insphn.'",
		WHERE ins_id="'.$insid.'"');

	if ($insUpdate){	
?>
		<script>
		alert('Successfully Updated');
        window.location.href='allinspectors.php';
        </script>
<?php
	 }
    else{
    	echo "Huh";
?>
		<script>
		// alert('Unsuccessful! Something Went Wrong');
  //       window.location.href='allinspectors.php';
         </script>
<?php
	}
}
?>