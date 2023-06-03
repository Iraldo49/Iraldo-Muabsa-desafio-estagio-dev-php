<?php

include '../model/validador.php';
include 'layout/header.php';
include '../controller/Produto.php';

$produto = new Produto();
$produtos = $produto->editProduct();
?>

<main class="content">
	<h2 class="title new-item">Editar produto</h2>
	
	<form action="../model/editar/produto.php" method="post">

	<?php foreach($produtos as $prod) {
		if($prod['id_produto'] == $_GET['id'] && $prod['id_usuario'] == $_SESSION['id']) {
	?>

		<div class="input-field">
			<label for="sku" class="label">Codigo do produto</label>
			<input type="text" name="sku" value="<?php echo $prod['sku']; ?>" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="name" class="label">Marca do produto</label>
			<input type="text" name="name" value="<?php echo $prod['name']; ?>" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="price" class="label">Preço</label>
			<input type="text" name="price" value="<?php echo $prod['price']; ?>" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="quantity" class="label">Quantidade</label>
			<input type="text" name="quantity" value="<?php echo $prod['quantity']; ?>" class="input-text" />
		</div>
		<div class="input-field">
			<label class="label">Categoria</label>
			<select name="category" class="input-text">
				<option value="">--Selecionar Categoria--</option>
				<option value="Alimento" <?php echo ($prod['category'] == 'Alimento') ? 'selected' : ''; ?>>Alimentação</option>
				<option value="Vestuario" <?php echo ($prod['category'] == 'Vestuario') ? 'selected' : ''; ?>>Vestuário</option>
				<option value="Ferramenta" <?php echo ($prod['category'] == 'Ferramenta') ? 'selected' : ''; ?>>Ferramenta</option>
				<option value="informático" <?php echo ($prod['category'] == 'informático') ? 'selected' : ''; ?>>Material informático</option>
			</select>
		</div>
		<div class="input-field">
			<label for="description" class="label">Descrição </label>
			<textarea name="description" class="input-text"><?php echo $prod['description']; ?></textarea>
		</div>

		<div class="input-field" style="margin-left: 140px;">
			<label class="custom-file-label">Selecionar a imagem</label>
			<input class="input-text" type="file" name="upload_file" value="<?php echo $prod['photo']; ?>">
		</div>

		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">

		<input type="hidden" name="id_produto" value="<?php echo $prod['id_produto']; ?>">

		<div class="actions-form">
			<a href="products" class="action back">Voltar</a>
			<input class="btn-submit action back" type="submit" value="salvar" />
		</div>

	<?php
		}
	}?>
		
	</form>
</main>

<?php include 'layout/footer.php'; ?>
