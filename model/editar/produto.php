<?php
include_once('model/conexao.php');

include '../validador.php';

if ($_FILES['upload_file']['name'] == '') {
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $id_produto = $_POST['id_produto'];

    include '../conexao.php';

    $query = "UPDATE tb_produto SET name=:name, sku=:sku, price=:price, quantity=:quantity, category=:category, description=:description WHERE id_produto=:id_produto";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_STR);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':id_produto', $id_produto, PDO::PARAM_INT);

    $stmt->execute();

    $error = $stmt->errorInfo();

    print_r($error);

    if ($error[0] == 0) {
        header('location: ../../view/dashboard?editar=sucesso');
    } else {
        header('location: ../../view/dashboard?editar=erro');
    }
} else {
    $maxSize = $_POST['MAX_FILE_SIZE'];

    $imagem = $_FILES['upload_file'];

    if ($_FILES['upload_file']['error'] == '1') {
        header('location: ../../view/cadastrar-produto?img_erro=1');
    }
    if ($_FILES['upload_file']['error'] == '2') {
        header('location: ../../view/cadastrar-produto?img_erro=2');
    }
    if ($_FILES['upload_file']['error'] == '3') {
        header('location: ../../view/cadastrar-produto?img_erro=3');
    }
    if ($_FILES['upload_file']['error'] == '5') {
        header('location: ../../view/cadastrar-produto?img_erro=5');
    }
    if ($_FILES['upload_file']['error'] == '6') {
        header('location: ../../view/cadastrar-produto?img_erro=6');
    }
    if ($_FILES['upload_file']['error'] == '7') {
        header('location: ../../view/cadastrar-produto?img_erro=7');
    }
    if ($maxSize < $_FILES['upload_file']['size']) {
        header('location: ../../view/cadastrar-produto?img_erro=tamanho');
    }

    if ($_FILES['upload_file']['error'] == '0' && $maxSize > $_FILES['upload_file']['size']) {
        $now = getdate();

        $codeDate = $now['year'] . '_' . $now['yday'] . '_';
        $codeDate .= $now['hours'] . $now['minutes'] . $now['seconds'];
        $codeDate = ($codeDate . '_' . rand(100, 999));
        $codePhoto = 'foto_' . $codeDate;
        $extension = strrchr($imagem['name'], '.');
        $namePhoto = $codePhoto . $extension;

        print_r($namePhoto);

        $arquivo_temporario = $imagem['tmp_name'];
        $arquivo = basename($imagem['name']);
        $diretorio = '../../upload';

        $moved = move_uploaded_file($arquivo_temporario, $diretorio . "/" . $namePhoto);

        if ($moved) {
            $photo = $namePhoto;
            $name = $_POST['name'];
            $sku = $_POST['sku'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $id_produto = $_POST['id_produto'];

            include '../conexao.php';

            $query = "UPDATE tb_produto SET photo=:photo, name=:name, sku=:sku, price=:price, quantity=:quantity, category=:category, description=:description WHERE id_produto=:id_produto";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':id_produto', $id_produto, PDO::PARAM_INT);

            $stmt->execute();

            $error = $stmt->errorInfo();

            print_r($error);

            if ($error[0] == 0) {
                header('location: ../../view/dashboard?editar=sucesso');
            } else {
                header('location: ../../view/dashboard?editar=erro');
            }
        }
    }
}
