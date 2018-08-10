<?php

include 'includes/map/conf.php'; 
// credits: https://developers.google.com/maps/articles/phpsqlajax_v3
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

// $connection=mysql_connect ('localhost', $username, $password);
// if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

// $db_selected = mysql_select_db($database, $connection);
// if (!$db_selected) {
//   die ('Can\'t use db : ' . mysql_error());
// }

// Select all the rows in the markers table
// OnlY Public Post
// $query = "SELECT * FROM submission WHERE 1 AND is_public=1";
//all post
$query = "SELECT * FROM submission WHERE 1";
$result = mysqli_query($dbc,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("rid",$row['report_id']);
  $newnode->setAttribute("ward",$row['ward_no']);
  $newnode->setAttribute("specificprob",$row['specific_prob']);
  $newnode->setAttribute("address", $row['map_addr']);
  $newnode->setAttribute("lat", $row['map_lat']);
  $newnode->setAttribute("lng", $row['map_lng']);
  $newnode->setAttribute("status", $row['initial_status']);

}

echo $dom->saveXML();
?>