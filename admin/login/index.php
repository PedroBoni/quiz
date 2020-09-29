<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Login do administrador</title>
</head>

<body class="vh-100">
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <main class="col-9 col-sm-7 col-md-5 col-lg-4 col-xl-3">
      <?php
      if ($_GET) {
        if ($_GET["error"] == 1)
          echo '
                <div class="alert alert-danger" role="alert">
                  Usuário ou senha inválidos!
                </div>';
      }
      ?>
      <form action="validation.php" method="post">
        <div class="form-group">
          <label for="nickname">Nome de usuário</label>
          <input type="text" class="form-control form-control-sm" name="nickname" id="nickname" required>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control form-control-sm" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-dark btn-sm w-100">Entrar</button>
      </form>
    </main>
  </div>
</body>

</html>