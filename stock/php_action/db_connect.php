<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "newPassword";
$dbname = "fivestar_inventory";
$dbport = "3307";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname,$dbport);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>