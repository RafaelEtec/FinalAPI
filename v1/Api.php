<?php 

	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
			echo json_encode($response);
			
			die();
		}
	}
	
	$response = array();
	
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createproduto':
				
				isTheseParametersAvailable(array('descricao','quantidade','valor', 'dataEntrada'));
				
				$db = new DbOperation();
				
				$result = $db->createProduto(
					$_POST['descricao'],
					$_POST['quantidade'],
					$_POST['valor'],
					$_POST['dataEntrada']
				);
				
				if($result){
					
					$response['error'] = false; 
		
					$response['message'] = 'Produto adicionado ao sistema';
	
					$response['produtos'] = $db->getProdutos();
				}else{

					$response['error'] = true; 

					$response['message'] = 'Ocorreu um erro, tente novamente';
				}
				
			break; 
			
			case 'getProdutos':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['produtos'] = $db->getProdutos();
			break; 
			
			case 'updateproduto':
				isTheseParametersAvailable(array('codigo','descricao','quantidade','valor','dataEntrada'));
				$db = new DbOperation();
				$result = $db->updateproduto(
					$_POST['codigo'],
					$_POST['descricao'],
					$_POST['quantidade'],
					$_POST['valor'],
					$_POST['dataEntrada']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Produto atualizado com sucesso';
					$response['produtos'] = $db->getProdutos();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Ocorreu um erro, tente novamente';
				}
			break; 
			
			case 'deleteproduto':

				if(isset($_GET['codigo'])){
					$db = new DbOperation();
					if($db->deleteProduto($_GET['codigo'])){
						$response['error'] = false; 
						$response['message'] = 'produto excluído com sucesso';
						$response['produtos'] = $db->getProdutos();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Ocorreu um erro, tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça o código';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API invalida';
	}
	
	echo json_encode($response);