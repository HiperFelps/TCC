<?php
session_start();
include 'conexao.php';
$id = $_SESSION['id'] ?? null;
if (!$id) {
    header("Location: login.php");
    exit();
}
$stmt = $conn->prepare("SELECT numPet, numColor, numNivel, numEnergia FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numPet, $numColor, $numNivel, $numEnergia);
$stmt->fetch();
$stmt->close();
$petFiles = ['petCat.gif', 'petCat.gif', 'petDino.gif', 'petCapi.gif'];
$colorCodes = ['#b5eac0', '#b5eac0', '#add8e6', '#ffb6c1'];
$petImagem = $petFiles[$numPet ?? 0] ?? 'pet.gif';
$corMenu = $colorCodes[$numColor ?? 0] ?? '#b5eac0';
$numNivel = $numNivel ?? 1;
$energiaAtual = $numEnergia ?? 5;
$energiaMaxima = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="niveis.php">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Plataforma ABC</h2></span>
        </div>
    </nav>

    <div class="pet_status">
        <img src="<?php echo htmlspecialchars($petImagem); ?>" alt="Pet" class="img-fluid"><br>
    
        <div style="display: flex; align-items: center; gap: 0.5vw;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fcc01e" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
            </svg>
            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="<?php echo $energiaAtual * 20; ?>" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" style="width: <?php echo ($energiaAtual / $energiaMaxima) * 100; ?>%"></div>
            </div>
        </div>
        <div>
            <h4><?php echo $energiaAtual . '/' . $energiaMaxima; ?></h4>
        </div>
    </div>

    <div class="menu">
        <h2 class="menu_title">Menu</h2>
        <button class="menu_button" onclick="jogar()">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
            </svg>    
            </button>
        <button class="menu_button" onclick="niveis()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-square-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            </svg>
        </button>
        <button class="menu_button" onclick="opcoes()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
        </button>
        <button class="menu_button" onclick="sair()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
        </button>
    </div>

    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
        }
        .navbar  {
            background-color: #b5eac0;
            width: 100vw;
            height: 12vh;
            padding-bottom: 1vh;
        }
        .container-fluid {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 10vh;
            padding-bottom: 1vh;
            padding-left: 1vw;
        }
        .top_title{
            font-size: 3rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            margin-top: -1vh;
            margin-left: 1vw;
            margin-bottom: 1vh;
        }
        .img-fluid{
            width: auto;
            height: auto;
            margin-left: 0vw;
            margin-bottom: 2vh;
        }
        .pet_status{
            margin-left: 10vw;
            margin-top: 28vh;
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            width: 20vw;
            height: 20vh;
        }
        .progress {
            width: 20vw;
            height: 1.5vh;
        }
        .menu{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
            width: 16vw;
            background-color: #b5eac0;
            border-radius: 20px;
            padding: 2vw 2vh 2vw 2vh;
            margin-left: 60vw;
            margin-top: -40vh;
            transition: height 0.3s, width 0.3s, transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transform-origin: center center;
        }
        .menu:hover {
            height: 60vh;
            width: 20vw;
            transform: scale(1.1);
            transition: height 0.3s, width 0.3s, transform 0.3s;
        }
        .menu_title{
            font-size: 3rem;
            margin-bottom: 2vh;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;

        }
        .menu_button{
            width: 80%;
            height: 10vh;
            background-color: #f0f0f0;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;
            margin: 1vh 0;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            transition: background 0.2s, color 0.2s;
        }
        .menu_button:hover {
            background-color: #e0e0e0;
            color: #636363;
            cursor: pointer;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
        // JS básico
        function jogar() {
            if(<?php echo $energiaAtual; ?> >= 5) {
                alert("Sobrecarga de Energia! Está na hora de uma pausa.");
                return;
            }else if (confirm("Você está pronto para jogar?")) {
                if(<?php echo $numNivel; ?> <= 0){
                    alert("Por favor, selecione um nível na seção Níveis.");
                    return;
                } else if (<?php echo $numNivel; ?> == 1){
                    window.location.href = "tutorial.php";
                } else if (<?php echo $numNivel; ?> == 2){
                    window.location.href = "tutorial2.php";
                } else if (<?php echo $numNivel; ?> == 3){
                    window.location.href = "tutorial3.php";
                } else {
                    alert("Parabéns! Você completou todos os níveis disponíveis.");
                    return;
                }
            }
        }
        function niveis() {
            window.location.href = "niveis.php";
        }
        function opcoes() {
            window.location.href = "opcoes.php";
        }
        function sair() {
            if (confirm("Você tem certeza que deseja sair?")) {
                window.location.href = "login.php";
            }
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            var menu = document.querySelector('.menu');
            if (menu) {
                menu.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var navbar = document.querySelector('.navbar');
            if (navbar) {
                navbar.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
        });
    </script>
</body>
</html>
