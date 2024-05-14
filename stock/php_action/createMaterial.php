<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $materialID 	= $_POST['materialID'];
  $materialName 	= $_POST['materialName'];
  // $productImage 	= $_POST['productImage'];
  $unit 			= $_POST['unit'];
  $quantity 		= $_POST['quantity'];
  $unitPrice 		= $_POST['unitPrice'];
 		
	$sql = "INSERT INTO Materials (MaterialID, MaterialName, Unit, UnitPrice,StockQuantity) 
				VALUES ('$materialID', '$materialName', '$unit', '$unitPrice', '$quantity')";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST