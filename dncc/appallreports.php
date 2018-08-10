<?php 
include "includes/conf.php";

$listsize=(int) $_POST["size"];
 
$offset=$listsize+8;
$sql="";
if(isset($_POST["contact"])){
$contact=$_POST["contact"];
$sql="SELECT  specific_prob,report_id,ward_no,address_details, submit_time,
STATUS , MAX( stat_change_time ) as last_status
FROM submission
LEFT JOIN report_status ON report_id = report_id_fk
where reporter_phone='$contact'
GROUP BY report_id order by last_status desc limit ".$listsize.",".$offset;}
elseif(isset($_POST["ward"])){
$ward=$_POST["ward"];
$sql="SELECT  specific_prob,report_id,ward_no,address_details, submit_time,
STATUS , MAX( stat_change_time ) as last_status
FROM submission
LEFT JOIN report_status ON report_id = report_id_fk
where ward_no='$ward'
GROUP BY report_id order by last_status desc limit ".$listsize.",".$offset;}
else{
$sql="SELECT  specific_prob,report_id,ward_no,address_details, submit_time,
STATUS , MAX( stat_change_time ) as last_status
FROM submission
LEFT JOIN report_status ON report_id = report_id_fk
GROUP BY report_id order by last_status desc limit ".$listsize.",".$offset;}
$result = mysqli_query($dbc,$sql);
$json = array();
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$json['reports'][]=$row;
}
}
mysqli_close($dbc);
echo json_encode($json); 
?>