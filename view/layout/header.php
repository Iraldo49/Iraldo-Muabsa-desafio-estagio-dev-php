
<!doctype html>
<html>

<head>
    <title>Desafio OTIMO</title>
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<link rel="stylesheet" href="../public/css/style.css">
  
</head>
<!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
    <div class="close-menu" alt="Close Menu" width="5" height="24">
        <a on="tap:sidebar.toggle"></a>
    </div>
    <div>
        <ul>
        <li><a href="dashboard" class="link-menu">Início</a></li>
            <li><a href="produtos" class="link-menu">Produtos</a></li>
            <li><a href="cadastrar-produto.php" class="link-menu">Adicionar produto</a></li>
            <li><a href="pedido" class="link-menu">Adicionar pedido</a></li>
            <li><a href="../model/validar/logout" class="link-menu">Sair</a></li>
        </ul>
    </div>
</amp-sidebar>
<header>
    <div class="go-menu">
        <a on="tap:sidebar.toggle">=Open siderbar</a>
    </div>
    <div class="right-box">
 
    </div>
</header>
<!-- Header -->