<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$materialID 	= $_POST['materialID'];
	$materialName 	= $_POST['materialName'];
	$unit 			= $_POST['unit'];
	$unitPrice 		= $_POST['unitPrice'];
	$quantity 		= $_POST['quantity'];

				
	$sql = "UPDATE materials SET materilaID = '$materialID', materialName = '$materialName', unit = '$unit',unitPrice ='$unitPrice' quantity = '$quantity', WHERE materialID = $materialId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating material info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
