<?php

include '../validador.php';

$id_produto = $_POST['id_produto'];

include '../conexao.php';

$query = "DELETE FROM tb_produto WHERE id_produto = :id_produto";
$stmt = $conexao->prepare($query);
$stmt->bindValue(':id_produto', $id_produto, PDO::PARAM_INT);
$stmt->execute();

$error = $stmt->errorInfo();

if ($error[0] == "00000") {
	header('Location: ../../view/produtos?deletar=sucesso');
	exit();
} else {
	header('Location: ../../view/produtos?deletar=erro');
	exit();
}
