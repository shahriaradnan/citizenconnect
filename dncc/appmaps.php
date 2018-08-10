<?php
include 'includes/conf.php';

 
$sql2="SELECT report_id, map_lat, map_lng, 
STATUS 
FROM submission
LEFT JOIN report_status ON report_id = report_id_fk
GROUP BY report_id " ;
$result = mysqli_query($dbc,$sql2);
$json = array();
 
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
$json['reports'][]=$row;
}
}
mysqli_close($connect);
echo json_encode($json); 
?>