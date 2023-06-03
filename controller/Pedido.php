<?php
include '../model/conexao.php';

if(!isset($_SESSION)) {
	include '../model/validador.php';
}
   

    $sql = "SELECT tpe.id_pedido, tpe.data_pedido, tpr.nome, tpr.price, ti.quantity FROM tb_pedido
            INNER JOIN tb_item ON tpe.id_pedido = ti.id_pedido INNER JOIN tb_produto ON ti.id_produto = tpe.id_produto
            WHERE tpe.id_pedido = :id_pedido";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pedido', $id_pedido);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        foreach ($result as $row) {
            echo "Pedido ID: " . $row["id_pedido"] . "<br>";
            echo "Data do Pedido: " . $row["data_pedido"] . "<br>";
            echo "Produto: " . $row["nome"] . "<br>";
            echo "Preço: " . $row["preco"] . "<br>";
            echo "Quantidade: " . $row["quantity"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

?>
