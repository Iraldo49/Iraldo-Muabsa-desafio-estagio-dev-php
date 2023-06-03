<?php

include '../model/validador.php';
include 'layout/header.php';


?>

<main class="content">
    <h3 class="title new-item"><a href="dashboard" class="action back"><</a>  Novo pedido</h3>
    <form action="../model/cadastrar/cad_pedido.php" method="post" enctype="multipart/form-data">
        <div class="input-field">
            <label for="name" class="label">Marca do produto</label>
            <input type="text" name="name" class="input-text" /> 
        </div>
        <div class="input-field">
            <label class="label">Categoria</label>
            <select name="category" class="input-text">
                <option value="">_______Selecionar Categoria_______</option>
                <option value="Electronico">Electronico</option>
                <option value="Alimento">Alimentação</option>
                <option value="Vestuario">Vestuário</option>
                <option value="Ferramenta">Ferramenta</option>
                <option value="Informático">Matérial informático</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="input-field">
            <label for="quantity" class="label">Quantidade:</label>
            <input class="input-text"  type="number" name="quantity" id="quantity" min="1" >
        </div>
        <div class="input-field">
            <label class="label">Preço Unitário:</label>
            <input class="input-text" type="number" name="price" id="price" step="0.01" >
        </div>
        <div class="input-field">
            <label class="label" for="subtotal">Subtotal:</label>
            <span class="input-text" id="subtotal">0.00</span>
        </div>
        <input type="hidden" name="status" class="input-text"  value="Em Aberto"/> 
        <div class="actions-form">
            <input class="action back" type="submit" value="Adicionar ao Pedido" />
        </div>
    </form>
    <!-- <script src="js/index.js"></script> -->
</main>
