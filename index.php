<?php
	require_once '../includes/DbOperation.php';
	
	$response = array(); 

    $db = new DbOperation();
	$response['error'] = false; 
	$response['message'] = 'Pedido concluído com sucesso';
	$response['produtos'] = $db->getProdutos();

	echo json_encode($response);
?>