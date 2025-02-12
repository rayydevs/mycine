<?php
session_start();

// Inclui o array de filmes
include 'filmes_data.php';

// Obtém o ID do filme a partir da URL
$id = $_GET['id'] ?? null;

if ($id && isset($filmes[$id])) {
  $filme = $filmes[$id];
} else {
  // Se o filme não existir, redireciona para a lista de filmes
  header('Location: filmes.php');
  exit();
}

// Funções auxiliares
function formatarData($data)
{
  return date('d/m/Y', strtotime($data));
}

function exibirGeneros($generos)
{
  return implode(', ', $generos);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($filme['titulo']); ?> - Detalhes</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/detalhes_filme.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div class="filme-container">
    <div class="movie-details">
      <h1><?php echo htmlspecialchars($filme['titulo']); ?></h1>
      <img class="vasco" src="<?php echo htmlspecialchars($filme['imagem']); ?>" alt="<?php echo htmlspecialchars($filme['titulo']); ?>">
      <p><strong>Data de Lançamento:</strong> <?php echo formatarData($filme['data_lancamento']); ?></p>
      <p><strong>Resumo:</strong> <?php echo htmlspecialchars($filme['resumo']); ?></p>
      <p><strong>Gêneros:</strong> <?php echo htmlspecialchars(exibirGeneros($filme['generos'])); ?></p>
      <p><strong>Nota:</strong> <?php echo htmlspecialchars($filme['nota']); ?> / 10</p>
      <p><strong>Preço do Ingresso:</strong> R$ <?php echo number_format($filme['preco'], 2, ',', '.'); ?></p>
      <a href="compra.php?id=<?php echo $filme['id']; ?>" class="buy-button">Comprar Ingresso</a>
    </div>
  </div>
</body>

</html>