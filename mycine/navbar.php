<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!-- Incluindo Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMRO2XtJ6a8hl8W0/oqbKyt8ir8wsY2ec8fZVxM" crossorigin="anonymous">
<link rel="stylesheet" href="css/navbar.css">
<div class="navbar">
  <div class="navbar-container">
    <div class="logo-container">
      <h1 class="logo">MyCine</h1>
    </div>
    <div class="menu-container">
      <ul class="menu-list">
        <li class="menu-list-item"><a href="index.php">Inicio</a></li>
        <li class="menu-list-item"><a href="filmes.php">Filmes</a></li>
        <li class="menu-list-item"><a href="contato.php">Contato</a></li>
        <li class="menu-list-item"><a href="membros.php">Membros</a></li>
      </ul>
    </div>
    <div class="profile-container">
      <!-- Substituindo a imagem pelo ícone -->
      <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
      <div id="profile-dropdown" class="dropdown-content">
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
          <a href="logout.php">Sair</a>
        <?php else: ?>
          <a href="login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleDropdown() {
    document.getElementById("profile-dropdown").classList.toggle("show");
  }
</script>

<style>

</style>