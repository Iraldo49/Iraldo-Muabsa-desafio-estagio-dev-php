<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Sign Up</title>
  <link rel="stylesheet" href="public/css/estilo.css">
</head>

<body>
  <div class="wrapper">
    <h2>Autenticação</h2>
    <form action="model/validar/login.php" method="post">
      <div class="input-box">
        <input type="text" name="email" class="input-text" required />
      </div>
      <div class="input-box">
        <input type="password" name="senha" class="input-text" required />
      </div>

      <div class="input-box button">
        <input class="btn-submit btn-action" type="submit" value="Entrar" />
      </div>
      <div class="text">
        <h3>Não tens conta?<a href="registroConta.php">Registra.</a></h3>
      </div>
    </form>
  </div>
</body>

</html>