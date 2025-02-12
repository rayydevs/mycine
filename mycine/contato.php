<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>MyCine - Contato</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/contato.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div>
  <div class="contato-container">
    <h2>Entre em Contato Conosco</h2>
    <form action="envio_contato.php" method="post">
      <label>Nome:
        <input type="text" name="nome" required>
      </label>
      <label>Email:
        <input type="email" name="email" required>
      </label>
      <label class="msg">Mensagem:
        <textarea name="mensagem" required></textarea>
      </label>
      <button type="submit">Enviar</button>
    </form>
  </div>
  </div>
</body>

</html>