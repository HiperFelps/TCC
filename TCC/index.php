<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <title>Alfabetizador</title>
</head>
<body>
   <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Alfabetizador</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>

    <div class="pet">
        <img src="Gato-Pet.png" alt="Pet">
    </div>

  <div class="menu">
    <ul>
        <li><h2 class="titulo">Menu</h2></li>
        <li><button class="menu-button" onclick = jogar()>Jogar</button></li>
        <li><button class="menu-button" onclick = niveis()>Níveis</button></li>
        <li><button class="menu-button" onclick = sair()>Sair</button></li>
    </ul>
    
    
    
    
  </div>
</body>
</html>

<script>
function jogar() {
    window.location.href = "jogar.html";
}
function niveis() {
    window.location.href = "niveis.html";
}
function sair() {
    window.close();
}
</script>