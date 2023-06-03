<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Registration </title>
	<link rel="stylesheet" href="public/css/estilo.css">
</head>

<body>
	<div class="wrapper">
		<h2>Registrar Conta</h2>
		<form action="model/validar/cadastro.php" method="post">
			<div class="input-box">
				<input type="text" name="cli_nome" class="input-text" placeholder="insira o seu nome:" required />
			</div>
			<div class="input-box">

				<input type="text" name="email" class="input-text" placeholder="insira o seu email:"  required />
			</div>
			<div class="input-box">
				<input type="password" name="senha" class="input-text" placeholder="insira a sua senha:"  required />
			</div>

			<div class="input-box button">
				<input class="btn-submit btn-action" type="submit" value="Registrar " />
			</div>
			<input type="hidden" name="status" value="1">
			<div class="text">
				<h3>já tem uma conta? <a href="index.php" class="action back">Entra</a></h3>
			</div>
		</form>
	</div>
</body>

</html>
