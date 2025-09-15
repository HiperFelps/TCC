<?php
session_start();
include 'conexao.php';
$id = $_SESSION['id'] ?? null;
if (!$id) {
    header("Location: login.php");
    exit();
}
$stmt = $conn->prepare("SELECT numPet, numColor FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numPet, $numColor);
$stmt->fetch();
$stmt->close();
$petFiles = ['pet.gif', 'petCat.gif', 'petDino.gif', 'petCapi.gif'];
$colorCodes = ['#b5eac0', '#b5eac0', '#add8e6', '#ffb6c1'];
$petImagem = $petFiles[$numPet ?? 0] ?? 'pet.gif';
$corMenu = $colorCodes[$numColor ?? 0] ?? '#b5eac0';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Níveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">    
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Níveis</h2></span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel1()">1</button>
            </div>
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel2()">2</button>
            </div>
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel3()">3</button>
            </div>
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel4()">4</button>
            </div>
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel5()">5</button>
            </div>
            <div class="col-md-2">
                    <button type="button" class="nivel_button" onclick="StartLevel6()">6</button>
            </div>
        </div>
    </div>
        <button onclick="Menu()" class="menu_button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
          </svg>
          Voltar ao Menu Principal
        </button>



    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
        }
        .navbar {
            background-color: #b5eac0;
            width: 100vw;
            height: auto;
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
        .top_title {
            font-size: 3rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            margin-top: -1vh;
            margin-left: 1vw;
            margin-bottom: 1vh;
        }

        .nivel_button {
            width: 7vw;
            height: 12vh;
            margin-top: 8vh;
            padding: 1vh;
            margin-right: 1vw;
            text-align: center;
            display: inline-block;
            background-color: #b5eac0;
            border: none;
            border-radius: 12px;
            font-size: 3rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            color: #333;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .nivel_button:hover {
            background-color: #a0d8b0;
        }
        .menu_button {
            background-color: #b5eac0;
            color: #333;
            font-size: 1.2rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            border: none;
            border-radius: 12px;         
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            padding: 12px 32px;
            position: fixed;
            left: 1vw;
            bottom: 2vh;
            margin: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
        }      
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
      // JS básico
      function StartLevel1() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 1?")) {
          window.location.href = "level1.php";
            }
        }
        function StartLevel2() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 2?")) {
                window.location.href = "level2.php";
            }
        }
        function StartLevel3() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 3?")) {
                window.location.href = "level3.php";
            }
        }
        function StartLevel4() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 4?")) {
            window.location.href = "level4.php";
            }
        }
        function StartLevel5() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 5?")) {
            window.location.href = "level5.php";
            }
        }
        function StartLevel6() {
            if(confirm("Você tem certeza que deseja iniciar o Nível 6?")) {
            window.location.href = "level6.php";
            }
        }
        function Menu() {
            window.location.href = 'menu.php';
        }
        document.addEventListener('DOMContentLoaded', function() {
            var navbar = document.querySelector('.navbar');
            if (navbar) {
                navbar.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var menu_button = document.querySelector('.menu_button');
            if (menu_button) {
                menu_button.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var nivelButtons = document.querySelectorAll('.nivel_button');
                nivelButtons.forEach(function(button) {
                button.style.backgroundColor = "<?php echo $corMenu; ?>";
            });
        });
    </script>
</body>
</html>
