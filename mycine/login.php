<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'] ?? '';
  $senha = $_POST['senha'] ?? '';

  // Validação simples
  if ($usuario == 'admin' && $senha == '123') {
    $_SESSION['logado'] = true;

    // Redireciona para a página anterior, se existir
    if (isset($_SESSION['pagina_anterior'])) {
      $redirecionar_para = $_SESSION['pagina_anterior'];
      unset($_SESSION['pagina_anterior']);
      header("Location: $redirecionar_para");
      exit();
    } else {
      header('Location: index.php');
      exit();
    }
  } else {
    $erro = 'Usuário ou senha inválidos.';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>MyCine - Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div class="main-container">
    <div class="login-container">
      <h2>Login</h2>
      <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
      <?php endif; ?>
      <form action="login.php" method="post">
        <label>Usuário:
          <input type="text" name="usuario" required>
        </label>
        <label>Senha:
          <input type="password" name="senha" required>
        </label>
        <button type="submit">Entrar</button>
      </form>
    </div>
  </div>
</body>

</html>