<?php

include '../validador.php';

if ($_FILES['upload_file']['name'] == '') {
    $id_usuario = $_POST['id_usuario'];
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    include '../conexao.php';

    $query = "INSERT INTO tb_produto (id_usuario, sku, name, price, quantity, category, description, status) VALUES 
    (:id_usuario, :sku, :name, :price, :quantity, :category, :description, :status)";

    $stmt = $conexao->prepare($query);

    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':sku', $sku, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);

    $stmt->execute();

    $error = $stmt->errorInfo();

    print_r($error);

    if ($error[0] == 0) {
        header('location: ../../view/dashboard?cadastro=sucesso');
    } else {
        header('location: ../../view/dashboard?cadastro=erro');
    }
} else {
    $upload_file_name = $_FILES['upload_file']['name'];
    $upload_file_tmp_name = $_FILES['upload_file']['tmp_name'];
    $upload_file_error = $_FILES['upload_file']['error'];
    $upload_file_size = $_FILES['upload_file']['size'];

    $maxSize = $_POST['MAX_FILE_SIZE'];

    if ($upload_file_error == UPLOAD_ERR_OK) {
        if ($upload_file_size > $maxSize) {
            header('location: ../../view/cadastrar-produto?img_erro=tamanho');
            exit;
        }

        $extension = pathinfo($upload_file_name, PATHINFO_EXTENSION);
        $namePhoto = 'foto_' . uniqid() . '.' . $extension;

        $arquivo_temporario = $upload_file_tmp_name;
        $diretorio = '../../upload';

        $moved = move_uploaded_file($arquivo_temporario, $diretorio . "/" . $namePhoto);

        if ($moved) {
            $photo = $namePhoto;
            $id_usuario = $_POST['id_usuario'];
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            include '../conexao.php';

            $query = "INSERT INTO tb_produto (id_usuario, photo, sku, name, price, quantity, category, description, status) VALUES 
            (:id_usuario, :photo, :sku, :name, :price, :quantity, :category, :description, :status)";

            $stmt = $conexao->prepare($query);

            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
            $stmt->bindParam(':sku', $sku, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);

            $stmt->execute();

            $error = $stmt->errorInfo();

            print_r($error);

            if ($error[0] == 0) {
                header('location: ../../view/dashboard?cadastro=sucesso');
            } else {
                header('location: ../../view/dashboard?cadastro=erro');
            }
        }
    } else {
        header('location: ../../view/cadastrar-produto?img_erro=' . $upload_file_error);
        exit;
    }
}
?>
