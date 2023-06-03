<?php

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$autenticado = false;

include '../conexao.php';

$query = "SELECT * FROM tb_cadastro WHERE email = :email";
$stmt = $conexao->prepare($query);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $usuario['senha'] == md5($senha)) {
    $autenticado = true;

    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario['id_usuario'];
    $_SESSION['status'] = $usuario['status'];
}

if ($autenticado) {
    header('location: ../../view/dashboard?login=sucesso');
} else {
    header('location: ../../login?login=erro');
}
