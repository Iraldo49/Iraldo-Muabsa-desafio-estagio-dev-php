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
	<ul class="product-list">

		<?php foreach ($produtos as $prod) {
			if ($prod['id_produto'] == $_GET['id'] && $prod['id_usuario'] == $_SESSION['id']) {

		?>
				<div class="product-info">
					<div class="product-name">

						<h3><?php echo $prod['name']; ?></h3>
					</div>

					<li>
						<div class="product-image">
							<a href="produto_detalhe">
								<?php if ($prod['photo'] != '') { ?>
									<img src="../upload/<?php echo $prod['photo']; ?>" layout="responsive" width="300" height="145" alt="<?php echo $prod['name']; ?>" />
								<?php } else { ?>
									<img src="../images/semFoto.jpg" layout="responsive" width="3000" height="145" />
								<?php } ?>
							</a>
						</div>

						<div class="product-price">
							<p><?php echo $prod['quantity']; ?> Disponivel</p><br>
							<span>MTN <?php echo $prod['price'];; ?></span>
						</div>
						<div class="product-price">

						</div>
				</div>
				</li>

		<?php
			}
		} ?>

	</ul>
</main>
<?php include 'layout/footer.php'; ?>