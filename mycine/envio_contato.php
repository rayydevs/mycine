<?php
session_start();

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Confirmação de Envio</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/envio_contato.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div class="contato-container">
    <?php
    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
      echo "<h2>Mensagem enviada com sucesso!</h2>";
      echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
      echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
      echo "<p><strong>Mensagem:</strong> " . nl2br(htmlspecialchars($mensagem)) . "</p>";
    } else {
      echo "<p>Erro: Todos os campos são obrigatórios!</p>";
    }
    ?>
    <a class="butao" href="contato.php">Voltar ao formulário de contato</a>
    <a class="butao" href="index.php">Voltar para a página inicial</a>
  </div>
</body>

</html>