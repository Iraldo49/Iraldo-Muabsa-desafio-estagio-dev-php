<?php

include '../model/conexao.php';

$query="SELECT * FROM tb_produto";

$stmt = $conexao->query($query);
$produtos = $stmt->FetchAll(PDO::FETCH_ASSOC);