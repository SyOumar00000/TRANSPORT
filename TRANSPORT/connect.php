<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$base = 'voyageurs';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
  $bd= mysqli_select_db($conn, $base); 

if(mysqli_connect_errno())
  {
  echo " failed to connect to mysql:".mysqli_connect_error();
  }
 ?>