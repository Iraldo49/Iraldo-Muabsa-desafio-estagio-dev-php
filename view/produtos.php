<?php
include '../model/validador.php';
include 'layout/header.php';

include '../controller/Produto.php';

$produto = new Produto();
$produtos = $produto->showProducts();
?>

<main class="content">
	<div class="header-list-page">
		<h1 class="title">Produtos</h1>
	</div>
	<a href="cadastrar-produto" class="btn-action">Add+</a>
	<table class="data-grid">
		<tr class="data-row">
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Marca do produto</span>
			</th>
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Codigo</span>
			</th>
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Preço</span>
			</th>
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Quantidade</span>
			</th>
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Categories</span>
			</th>
			<th class="data-grid-th">
				<span class="data-grid-cell-content">Ações</span>
			</th>
		</tr>
		
		<?php foreach($produtos as $prod) {
			if($prod['id_usuario'] == $_SESSION['id']) {
				$price = floatval($prod['price']);
				$price = number_format($price, 2, ',' , '.');
		?>
				<tr>
					<td class="data-grid-td">
						<span class="data-grid-cell-content"><?php echo $prod['name']; ?></span>
					</td>
					<td class="data-grid-td">
						<span class="data-grid-cell-content"><?php echo $prod['sku']; ?></span>
					</td>
					<td class="data-grid-td">
						<span class="data-grid-cell-content"><?php echo $price; ?> MTN</span>
					</td>
					<td class="data-grid-td">
						<span class="data-grid-cell-content"><?php echo $prod['quantity']; ?></span>	
					</td>
					<td class="data-grid-td">
						<span class="data-grid-cell-content"><?php echo $prod['category']; ?></span>
					</td>
					<td class="data-grid-td">
						<div class="actions">
							<div class="action edit">
								<a href="editar-produto?id=<?php echo $prod['id_produto']; ?>"><span>Edit</span></a>
							</div>
							<div class="action delete">
								<form action="../model/deletar/produto.php" method="post">
									<input type="hidden" name="id_produto" value="<?php echo $prod['id_produto']; ?>">
									<input type="submit" value="Delete" style="color: red; font-size: 13px;">
								</form>
							</div>
						</div>
					</td>
				</tr>
		<?php
			}
		}
		?>
	</table>
</main>

<?php include 'layout/footer.php'; ?>
