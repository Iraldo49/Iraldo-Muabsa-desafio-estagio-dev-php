<?php 

session_start();

include '../conexao.php';

$autenticado = false;

// Verifica se o email já foi usado
$query_verificar_email = "SELECT * FROM tb_cadastro WHERE email = :email";
$stmt_verificar_email = $conexao->prepare($query_verificar_email);
$stmt_verificar_email->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt_verificar_email->execute();

if ($stmt_verificar_email->rowCount() > 0) {
    // Email já existe, exibe um alerta em JavaScript
    echo '<script>alert("O email já foi usado. Por favor, escolha outro email.");</script>';
	header('location: ../../index?cadastro.php');
} else {
    // O email não existe, prossiga com a inserção
    $query = "INSERT INTO tb_cadastro (cli_nome, email, senha, status) VALUES (:cli_nome, :email, :senha, :status)";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':cli_nome', $_POST['cli_nome'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindValue(':senha', md5($_POST['senha']), PDO::PARAM_STR);
    $stmt->bindValue(':status', $_POST['status'], PDO::PARAM_INT);
    $stmt->execute();

    $error = $stmt->errorInfo();

    if ($error[0] == 0) {
        $autenticado = true;

        $query_id = "SELECT * FROM tb_cadastro ORDER BY id_usuario DESC LIMIT 1";
        $stmt = $conexao->query($query_id);
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $id_usuario = $usuario[0]['id_usuario'];
        $status_usuario = $usuario[0]['status'];

        if ($autenticado == true) {
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $id_usuario;
            $_SESSION['status'] = $status_usuario;
        } else {
        
			header('location: ../../index?cadastro=erro');
        }
    } else {

        header('location: ../../app/dashboard?cadastro=sucesso');
    }
}
