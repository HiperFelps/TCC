<?php
session_start();
include 'conexao.php';
$id = $_SESSION['id'] ?? null;
if (!$id) {
    header("Location: login.php");
    exit();
}
$stmt = $conn->prepare("SELECT numColor FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numColor);
$stmt->fetch();
$stmt->close();
$colorCodes = ['#b5eac0', '#b5eac0', '#add8e6', '#ffb6c1'];
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
            <div class="col-md-3">
                    <button type="button" class="nivel_button" onclick="StartLevel1()">1</button>
            </div>
            <div class="col-md-3">
                    <button type="button" class="nivel_button" onclick="StartLevel2()">2</button>
            </div>
            <div class="col-md-3">
                    <button type="button" class="nivel_button" onclick="StartLevel3()">3</button>
            </div>
        </div>
    </div>
        <button onclick="Menu()" class="menu_button">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
            </svg>
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
        .row{
            margin-top: 5vh;
            text-align: center;
            justify-content: center;
        }
        .nivel_button {
            width: 10vw;
            height: 18vh;
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
        .menu_button:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
      // JS básico
      function StartLevel1() {
          window.location.href = "tutorial.php";
        }
        function StartLevel2() {
                window.location.href = "tutorial2.php";
        }
        function StartLevel3() {
                window.location.href = "tutorial3.php";
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