<?php

include '../model/validador.php';
include 'layout/header.php';

// include '../controller/Categoria.php';

?>

<main class="content">

	<h3 class="title new-item"><a href="dashboard" class="action back"><</a>  New Product</h3>
	<form action="../model/cadastrar/produto.php" method="post" enctype="multipart/form-data">
		<div class="input-field">
			<label for="sku" class="label">Codigo do produto</label>
			<input type="text" name="sku" class="input-text"  placeholder="insira o codigo do produto:"/> 
		</div>
		<div class="input-field">
			<label for="name" class="label">Marca do produto</label>
			<input type="text" name="name" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="price" class="label">Preço do produto</label>
			<input type="text" name="price" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="quantity" class="label">Quantidade</label>
			<input type="text" name="quantity" class="input-text" /> 
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
			<label class="label">Selecione a imagem</label>
			<input class="input-text" type="file" name="upload_file">
		</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<input type="hidden" name="status" value="1">
			<input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">
		<div class="input-field">
			<label for="description" class="label">Descrição </label>
			<textarea name="description" class="input-text"></textarea>
		</div>
		<div class="actions-form">
			
			<input class="action back" type="submit" value="Registrar" />
		</div>
		
	</form>
</main>


