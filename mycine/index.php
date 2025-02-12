<?php
session_start();
include 'filmes_data.php'; // Inclui o arquivo de dados dos filmes
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <title>MyCine</title>
</head>

<body>
  <?php include 'navbar.php'; ?> <!-- Inclui o navbar -->

  <div class="container">
    <div class="content-container">
      <!-- Conteúdo em destaque -->
      <div class="featured-content" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-1.jpg');">
        <p class="featured-desc" style="margin-top: 200px;">
          Venom: A Última Rodada segue Eddie Brock enquanto ele luta para controlar seu relacionamento com o simbiótico Venom.
          Ele enfrenta um novo vilão que representa uma ameaça significativa, revelando uma conspiração envolvendo outros simbióticos.
        </p>
      </div>
      <div class="movie-list-container">
        <h1 class="movie-list-title-h1">Programação</h1>
        <div class="movie-list-wrapper">
          <div class="movie-list">
            <?php foreach ($filmes as $filme): ?>
              <div class="movie-list-item">
                <img class="movie-list-item-img" src="<?php echo $filme['imagem']; ?>" alt="<?php echo htmlspecialchars($filme['titulo']); ?>">
                <span class="movie-list-item-title"><?php echo htmlspecialchars($filme['titulo']); ?></span>
                <p class="movie-list-item-desc"><?php echo htmlspecialchars($filme['descricao']); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
          <i class="fas fa-chevron-right arrow"></i>
        </div>
      </div>
      <!-- Outra seção em destaque -->
      <div class="featured-content" style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-2.jpg');">
        <img class="featured-title" src="img/f-t-2.png" alt="Venom">
        <p class="featured-desc">"Venom: A Última Rodada" segue Eddie Brock, que luta para equilibrar sua vida 
                    como jornalista e hospedeiro do simbiótico Venom. Quando uma nova ameaça surge, colocando em risco não
                     apenas sua vida, mas também a de seus entes queridos, Eddie e Venom devem enfrentar um vilão poderoso 
                     que os obriga a unir forças de maneiras inesperadas. O filme explora a relação entre Eddie e Venom, enquanto
                      eles enfrentam desafios que testam sua lealdade e identidade.</p>
      </div>
    </div>
  </div>
  <script src="app.js"></script>
</body>

</html>