<?php
include 'includes/conf.php';

$id=$_POST["id"];
$sql2="SELECT specific_prob, report_id, ward_no, map_addr, photo, reporter_name, reporter_phone, address_details, description, submit_time, 
STATUS , MAX( stat_change_time ) AS last_sts_time
FROM submission
LEFT JOIN report_status ON report_id = report_id_fk
WHERE report_id =".$id;
$sql2res=mysqli_query($dbc,$sql2);
$output=mysqli_fetch_assoc($sql2res);
 
echo json_encode($output);
mysqli_close($dbc);
?>