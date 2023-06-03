<?php
include '../model/validador.php';
include 'layout/header.php';
include '../controller/Produto.php';

$produto = new Produto();
$produtos = $produto->showDashboard();
?>


<main class="content">
	<div class="header-list-page">
		<h2 class="title">Produtos</h2>
	</div>
	<div class="infor">
		<p>Você tem <?php $numProdutocts?>  produtos adicionados em sua loja: <a href="cadastrar-produto" class="btn-action">Add+</a></p>
		</div>
	<ul class="product-list">
	
	<?php foreach ($produtos as $prod) {
		if ($prod['id_usuario'] == $_SESSION['id']) {
			$price = floatval($prod['price']);
			$price = number_format($price, 2, ',', '.');
	?>
		
	

		<li>
			<div class="product-image">
				<a href="produto_detalhe">
					<?php if ($prod['photo'] != '') { ?>
						<img src="../upload/<?php echo $prod['photo']; ?>" layout="responsive" width="164" height="145" alt="<?php echo $prod['name']; ?>" />
					<?php } else { ?>
						<img src="../images/semFoto.jpg" layout="responsive" width="164" height="145" />
					<?php } ?>
				</a>
			</div>
			<div class="product-info">
				<div class="product-name">
					<span><?php echo $prod['name']; ?></span>
				</div>
				<div class="product-price">
					<span class="special-price"><?php echo $prod['quantity']; ?> Disponiveis</span><br>
					<span>MTN <?php echo $price; ?></span>
				</div>
				<div class="product-price">
					<span class="special-price">
						<!-- <button type="button" class="add_cart">Add a carinha</button> -->
					</span>
					<span></span>
				</div>
			</div>
		</li>
			
	<?php
		}
	} ?>

	</ul>
	
</main>
<?php include 'layout/footer.php'; ?>
