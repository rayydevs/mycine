<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
  // Armazena a página atual para redirecionamento após o login
  $_SESSION['pagina_anterior'] = $_SERVER['REQUEST_URI'];
  header('Location: login.php');
  exit();
}

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
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Comprar Ingresso - <?php echo htmlspecialchars($filme['titulo']); ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/compra.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Conteúdo Principal -->
  <div class="container">
    <h2>Comprar Ingresso - <?php echo htmlspecialchars($filme['titulo']); ?></h2>
    <section class="formulario">
      <form action="processo_compra.php" method="post">
        <!-- Campos ocultos com o ID, título e preço do filme -->
        <input type="hidden" name="filme_id" value="<?php echo $filme['id']; ?>">
        <input type="hidden" name="filme_titulo" value="<?php echo htmlspecialchars($filme['titulo']); ?>">
        <input type="hidden" name="filme_preco" value="<?php echo $filme['preco']; ?>">

        <legend>Escolha sua poltrona:</legend>
        <div class="lugares">
          <?php for ($i = 1; $i <= 30; $i++): ?>
            <label>
              <input type="radio" value="Poltrona <?php echo $i; ?>" name="Poltronas" required>
              Poltrona <?php echo $i; ?>
            </label>
          <?php endfor; ?>
        </div>

        <div class="unificacao">
          <div class="Combos">
            <legend>Escolha seu combo:</legend>
            <label>
              <input type="radio" value="Pipoca G + Tubaina" name="Combos" required>
              Pipoca "G" + Tubaina: R$ 30,00
            </label>
            <label>
              <input type="radio" value="Pipoca M + Fanta Uva" name="Combos">
              Pipoca "M" + Fanta Uva: R$ 35,00
            </label>
            <label>
              <input type="radio" value="Pipoca M + Guaraná" name="Combos">
              Pipoca "M" + Guaraná: R$ 40,00
            </label>
            <label>
              <input type="radio" value="Pipoca P + Coca Cola" name="Combos">
              Pipoca "P" + Coca Cola: R$ 50,00
            </label>
          </div>

          <div class="Compra">
            <legend>Selecione o seu Ingresso:</legend>
            <label>
              <input type="radio" value="Ingresso Prime" name="Ingressos" required>
              Ingresso Prime: R$ 55,00
            </label>
            <label>
              <input type="radio" value="Ingresso Básico" name="Ingressos">
              Ingresso Básico: R$ 45,00
            </label>
          </div>
        </div>

        <div class="cartao">
          <legend>Forma de Pagamento</legend>
          <label>Nome no Cartão:
            <input type="text" name="nome_cartao" required placeholder="Nome impresso no cartão">
          </label>
          <label>Número do Cartão:
            <input type="text" name="numero_cartao" maxlength="16" required placeholder="Número do cartão">
          </label>
          <label>Data de Validade:</label>
          <select name="mes_validade" required>
            <option value="">Mês</option>
            <?php for ($m = 1; $m <= 12; $m++): ?>
              <option value="<?php echo str_pad($m, 2, '0', STR_PAD_LEFT); ?>">
                <?php echo str_pad($m, 2, '0', STR_PAD_LEFT); ?>
              </option>
            <?php endfor; ?>
          </select>
          <select name="ano_validade" required>
            <option value="">Ano</option>
            <?php for ($a = date('Y'); $a <= date('Y') + 10; $a++): ?>
              <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <button type="submit">Confirmar</button>
        <button type="reset">Limpar</button>
      </form>
    </section>
  </div>
</body>

</html>