<?php
include 'includes/conf.php'; 

        $wno=$_POST["ward_no"];
 	$spaddr=$_POST["address"];
 	$rpDes=$_POST["description"];
 	$rprtrName=$_POST["reporter_name"];
 	$rptrtPhn=$_POST["reporter_phone"];
 	$df_status="open";
 	$image = $_POST['image_string'];
        $lt=$_POST['latitude'];
        $ln=$_POST['longitude'];

  $specificProb=$_POST['title'];
      //Photo
  $folder="rppic/";
  $rpShare=1;
  $iniStat="Open";
  $media="App";

  $sql ="SELECT MAX( report_id ) AS max_value 
FROM submission";
 	$res = mysqli_query($dbc,$sql);
  $row = mysqli_fetch_assoc($res);
  
  $id= $row['max_value'];
  //$id=100;
  $filename = "$id.jpg";
  file_put_contents($folder.$filename,base64_decode($image));
  if(mysqli_query($dbc,"INSERT INTO 
    submission(specific_prob,ward_no,address_details,map_lat,map_lng,photo,description,is_public,from_media,initial_status,reporter_name,reporter_phone,submit_time) 
      VALUES 
      ('$specificProb','$wno','$spaddr','$lt','$ln','$filename','$rpDes','$rpShare','$media','$iniStat','$rprtrName','$rptrtPhn',NOW());"))
    {
    echo "Successfully submitted";}
    else echo "Connection problem"; 
    //echo "bal";
    
 ?>