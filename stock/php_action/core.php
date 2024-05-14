<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: http://localhost:'.$dbport.'/stock/index.php');	 # check dpport, it was 9080 before.
} 
?>