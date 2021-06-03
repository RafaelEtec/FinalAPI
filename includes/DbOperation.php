<?php
 
class DbOperation
{
    
    private $con;
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        $db = new DbConnect();
 
        $this->con = $db->connect();
    }
	
	function createProduto($codigo, $descricao, $quantidade, $valor, $dataEntrada){
		$stmt = $this->con->prepare("INSERT INTO tbprodutos (codigo, descricao, quantidade, valor, dataEntrada) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssis", $codigo, $descricao, $quantidade, $valor, $dataEntrada);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getProdutos(){
		$stmt = $this->con->prepare("SELECT codigo, descricao, quantidade, valor, dataEntrada FROM tbprodutos");
		$stmt->execute();
		$stmt->bind_result($codigo, $descricao, $quantidade, $valor, $dataEntrada);
		
		$produtos = array(); 
		
		while($stmt->fetch()){
			$produto  = array();
			$produto['codigo'] = $codigo; 
			$produto['descricao'] = $descricao; 
			$produto['quantidade'] = $quantidade; 
			$produto['valor'] = $valor; 
			$produto['dataEntrada'] = $dataEntrada; 
			
			array_push($produtos, $produto); 
		}
		
		return $produtos; 
	}
	
	function updateProduto($codigo, $descricao, $quantidade, $valor){
		$stmt = $this->con->prepare("UPDATE tbprodutos SET descricao = ?, quantidade = ?, valor = ? WHERE codigo = ?");
		$stmt->bind_param("ssisi", $descricao, $quantidade, $valor, $codigo);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	function deleteProduto($codigo){
		$stmt = $this->con->prepare("DELETE FROM tbprodutos WHERE codigo = ? ");
		$stmt->bind_param("i", $codigo);
		if($stmt->execute())
			return true; 
		return false; 
	}
}