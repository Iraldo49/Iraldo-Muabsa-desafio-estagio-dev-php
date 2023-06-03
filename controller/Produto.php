<?php 

if(!isset($_SESSION)) {
	include '../model/validador.php';
}

class Produto
 {
	public $id = null;
	public $name = null;
	public $sku = null;
	public $price = null;
	public $quantity = null;
	public $category = null;
	public $description = null;
	public $status = null;


	public function __set($attribute, $value) 
	{
		$this->$attribute = $value;
	}


	public function __get($attribute) 
	{
		return $this->$attribute;
	}

	

	public function showProducts() 
	{
		include '../model/conexao.php';
		$query="SELECT * FROM tb_produto";
		$stmt = $conexao->query($query);
		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		
		return $produtos;
	}


	public function editProduct() 
	{

		include '../model/conexao.php';
		$query="SELECT * FROM tb_produto";
		$stmt = $conexao->query($query);
		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $produtos;
	}


	public function showDashboard()
	{
		$id = $_SESSION['id'];
		include '../model/conexao.php';
		$query = "SELECT COUNT(id_produto) FROM tb_produto WHERE id_usuario='$id'";
		$stmt = $conexao->query($query);
		$totalDeProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$numProdutocts = $totalDeProdutos[0]['COUNT(id_produto)'];
		$query = "SELECT * FROM tb_produto";
		$stmt = $conexao->query($query);
		$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		return $produtos;
	}
}


$produto = new Produto();
