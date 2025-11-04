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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizador - Números</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .header {
            background-color: #a6dba8;
            padding: 15px;
            font-size: 2rem;
            font-weight: bold;
            color: #000;
            text-align: left;
            padding-left: 20px;
        }

        .container-principal {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 75vh; 
            flex-direction: column;
        }

        .titulo {
            font-size: 2.5rem;
            margin-bottom: 30px;
            margin-top: 0;
            font-weight: bold;
        }
        .numero {
            font-size: 6rem;
            font-weight: bold;
            color: white;
            background-color: #a6dba8; 
            border-radius: 20px;
            padding: 15px 30px;
            margin-bottom: 15px;
            display: inline-block;
            box-shadow: 4px 4px 8px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: transform 0.3s;
        }
        .numero:hover {
            transform: scale(1.1);
            background-color: #8ccf90;
        }
        .macas img {
            width: 50px;
            margin: 3px;
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
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
        .next_button {
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
            right: 1vw;
            bottom: 2vh;
            margin: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
        }
        .next_button:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

        .confete {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 999;
        }
        .confete span {
            position: absolute;
            display: block;
            width: 10px;
            height: 10px;
            background: #ffcc00;
            opacity: 0.7;
            animation: cair 3s linear forwards;
        }
        @keyframes cair {
            to {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <header class="header">Alfabetizador</header>

    <div class="container-principal">
        <h2 class="titulo">Números</h2>

        <div class="container">
            <div class="row justify-content-center">
               
                <div class="col-6 col-md-2 mb-4">
                    <div class="numero" onclick="mostrarMensagem(1)">1</div>
                    <div class="macas">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                    </div>
                </div>

                <div class="col-6 col-md-2 mb-4">
                    <div class="numero" onclick="mostrarMensagem(2)">2</div>
                    <div class="macas">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                    </div>
                </div>

                <div class="col-6 col-md-2 mb-4">
                    <div class="numero" onclick="mostrarMensagem(3)">3</div>
                    <div class="macas">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                    </div>
                </div>

                <div class="col-6 col-md-2 mb-4">
                    <div class="numero" onclick="mostrarMensagem(4)">4</div>
                    <div class="macas">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                    </div>
                </div>

                <div class="col-6 col-md-2 mb-4">
                    <div class="numero" onclick="mostrarMensagem(5)">5</div>
                    <div class="macas">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">
                    </div>
                </div>
            </div>
        </div>
    </div>

        <button onclick="voltar()" class="menu_button">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
        </button>
        <button onclick="Next()" class="next_button">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
        </svg>
        </button>

    <div class="confete" id="confete"></div>

    <script>
        function mostrarMensagem(numero) {
            soltarConfetes();
        }

        function voltar() {
            window.location.href = "menu.php";
        }

        function Next() {
          window.location.href = 'numero1.php';
        }

        function soltarConfetes() {
            const confeteContainer = document.getElementById('confete');
            confeteContainer.innerHTML = '';
            for (let i = 0; i < 50; i++) {
                let confete = document.createElement('span');
                confete.style.left = Math.random() * 100 + 'vw';
                confete.style.backgroundColor = randomColor();
                confete.style.width = confete.style.height = Math.random() * 8 + 8 + 'px';
                confete.style.animationDuration = Math.random() * 2 + 2 + 's';
                confeteContainer.appendChild(confete);
            }
            setTimeout(() => {
                confeteContainer.innerHTML = '';
            }, 3000);
        }

        function randomColor() {
            const cores = ['#ffcc00', '#ff6666', '#66ccff', '#66ff66', '#ff99cc'];
            return cores[Math.floor(Math.random() * cores.length)];
        }

        document.addEventListener('DOMContentLoaded', function() {
            var header = document.querySelector('.header');
            if (header) {
                header.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var menu_button = document.querySelector('.menu_button');
            if (menu_button) {
                menu_button.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var numero = document.querySelectorAll('.numero');
                numero.forEach(function(button) {
                button.style.backgroundColor = "<?php echo $corMenu; ?>";
            });
            var next_button = document.querySelector('.next_button');
            if (next_button) {
                next_button.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
        });
        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>