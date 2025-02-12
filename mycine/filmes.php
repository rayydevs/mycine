<?php
session_start();

// Inclui o array de filmes
include 'filmes_data.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>MyCine - Filmes</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/filmes.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div class="container">
    <div class="content-container">
      <h1 class="movie-list-title">Filmes Disponíveis</h1>
      <div class="movie-list">
        <?php foreach ($filmes as $filme): ?>
          <div class="movie-list-item">
            <img class="movie-list-item-img" src="<?php echo htmlspecialchars($filme['imagem']); ?>" alt="">
            <span class="movie-list-item-title"><?php echo htmlspecialchars($filme['titulo']); ?></span>
            <p class="movie-list-item-desc"><?php echo htmlspecialchars($filme['descricao']); ?></p>
            <a href="detalhes_filme.php?id=<?php echo $filme['id']; ?>" class="movie-list-item-button">Ver Mais</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>

</html>