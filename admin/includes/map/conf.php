<?php

$hostname="localhost";
$username="";
$pass="";
$dbname="";

//making DB connection
$dbc=mysqli_connect($hostname,$username,$pass,$dbname)OR die("DB connection failed".mysql_error());


#mysqli_connect('localhost', 'root', '');
#mysqli_select_db('alhabib');

?>