<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
  header('Location: login.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Recebe e valida os dados
  $filme_id = $_POST['filme_id'] ?? '';
  $filme_titulo = $_POST['filme_titulo'] ?? '';
  $filme_preco = $_POST['filme_preco'] ?? 0;
  $poltrona = $_POST['Poltronas'] ?? '';
  $combo = $_POST['Combos'] ?? '';
  $ingresso = $_POST['Ingressos'] ?? '';
  $nome_cartao = $_POST['nome_cartao'] ?? '';
  $numero_cartao = $_POST['numero_cartao'] ?? '';
  $mes_validade = $_POST['mes_validade'] ?? '';
  $ano_validade = $_POST['ano_validade'] ?? '';
  $cvv = $_POST['cvv'] ?? '';
  $bandeira_cartao = $_POST['bandeira_cartao'] ?? '';

  // Cálculo do valor total
  $total = 0;

  // Valor do ingresso (preço do filme)
  $total += floatval($filme_preco);

  // Valor do tipo de ingresso
  if ($ingresso == 'Ingresso Prime') {
    $total += 10; // Supondo um acréscimo de R$10 para o ingresso Prime
  } elseif ($ingresso == 'Ingresso Básico') {
    // Sem acréscimo
  }

  // Valor do combo
  switch ($combo) {
    case 'Pipoca G + Tubaina':
      $total += 30;
      break;
    case 'Pipoca M + Fanta Uva':
      $total += 35;
      break;
    case 'Pipoca M + Guaraná':
      $total += 40;
      break;
    case 'Pipoca P + Coca Cola':
      $total += 50;
      break;
  }

  // Exibe o resumo da compra
?>
  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <title>Resumo da Compra</title>
    <link rel="stylesheet" href="css/processo_compra.css">
    <link rel="stylesheet" href="css/navbar.css">
  </head>

  <body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Conteúdo Principal -->
    <div class="compra-container">
      <section class="resumo">
        <h2>Resumo da sua Compra</h2>
        <p><strong>Filme:</strong> <?php echo htmlspecialchars($filme_titulo); ?></p>
        <p><strong>Poltrona Selecionada:</strong> <?php echo htmlspecialchars($poltrona); ?></p>
        <p><strong>Ingresso Selecionado:</strong> <?php echo htmlspecialchars($ingresso); ?></p>
        <p><strong>Combo Selecionado:</strong> <?php echo htmlspecialchars($combo); ?></p>

        <h3>Dados do Pagamento:</h3>
        <p><strong>Nome no Cartão:</strong> <?php echo htmlspecialchars($nome_cartao); ?></p>
        <p><strong>Número do Cartão:</strong> <?php echo '**** **** **** ' . substr($numero_cartao, -4); ?></p>
        <p><strong>Data de Validade:</strong> <?php echo htmlspecialchars($mes_validade . '/' . $ano_validade); ?></p>
        <p><strong>Bandeira:</strong> <?php echo htmlspecialchars($bandeira_cartao); ?></p>

        <p><strong>Valor Total:</strong> R$ <?php echo number_format($total, 2, ',', '.'); ?></p>

        <h3>Compra Finalizada com Sucesso!</h3>
        <a class="inicial" href="index.php">Voltar para a página inicial</a>
      </section>
    </div>
  </body>

  </html>
<?php
} else {
  // Se o formulário não foi enviado, redireciona para a página de compra
  header('Location: filmes.php');
  exit();
}
?>