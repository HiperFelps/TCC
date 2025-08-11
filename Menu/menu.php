<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Alfabetizador</h2></span>
        </div>
    </nav>

    <div class="pet_status">
        <img src="#" alt="Pet" class="img-fluid" style="width: 100%; height: auto; margin-top: 20px;">
        <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" style="width: 50%"></div>
        </div>
    </div>

    <div class="menu">
        <h2 class="menu_title">Menu</h2>
        <button class="menu_button" onclick="jogar()">Jogar</button>
        <button class="menu_button" onclick="niveis()">Níveis</button>
        <button class="menu_button" onclick="opcoes()">Opções</button>
        <button class="menu_button" onclick="sair()">Sair</button>
    </div>

    <style>
        .container-fluid {
            background-color: #b5eac0;
            width: 100vw;
            height: 10vh;
            margin-top: -0.8vh;
            padding-left: 1vw;
        }
        .top_title{
            font-size: 3rem;
            font-family: 'Brush Script MT', cursive;
        }
        .pet_status{
            margin-left: 8vw;
            margin-top: 32vh;

        }
        .progress {
            width: 20vw;
            height: 1.5vh;
        }
        .menu{
            display: flex;
            flex-direction: column;
            align-items: center;0
            justify-content: center;
            height: 60vh;
            width: 20vw;
            background-color: #b5eac0;
            border-radius: 20px;
            padding: 2vw 2vh 2vw 2vh;
            margin-left: 60vw;
            margin-top: -25vh;
        }
        .menu_title{
            font-size: 3rem;
            margin-bottom: 2vh;
            font-family: 'Brush Script MT', cursive;

        }
        .menu_button{
            width: 80%;
            height: 10vh;
            background-color: #f0f0f0;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;
            margin: 1vh 0;
            font-family: 'Brush Script MT', cursive;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        .menu_button:hover {
            background: linear-gradient(90deg, #b5eac0 0%, #f0f0f0 100%);
            color: #388e3c;
            box-shadow: 0 4px 16px rgba(56, 142, 60, 0.15);
            cursor: pointer;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
        // JS básico
        function jogar() {
            if (confirm("Você tem certeza que deseja jogar?")) {
                window.location.href = "jogar.php";
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
                window.location.href = "index.php";
            }
        }
    </script>
</body>
</html>