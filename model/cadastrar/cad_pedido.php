<?php

include '../conexao.php';


$data_pedido = date("Y-m-d");
$sql = "INSERT INTO tb_pedido (`id_pedido`, `data_pedido`, `status`) 
VALUES (:id_pedido, :data_pedido, :status)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_pedido', $id_pedido);
$stmt->bindParam(':data_pedido', $data_pedido);
$stmt->bindParam(':status', $status);
$status = "Em Aberto"; 
$stmt->execute();
$id_pedido = $conexao->lastInsertId();

$id_produto  = 'id_produto';
$quantity = $_POST['quantity'];

$sql = "INSERT INTO tb_item (`id_item`, `id_produto`, `id_pedido`, `name`, `quantity`, `category`, `price`) 
VALUES (:id_item, :id_produto, :id_pedido, :name, :quantity, :category, :price)";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_item', $id_item);
$stmt->bindParam(':id_produto', $id_produto);
$stmt->bindParam(':id_pedido', $id_pedido);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':price', $price);
$id_item = "";
$name = ""; 
$category = ""; 
$price = ""; 
$stmt->execute();

?>
