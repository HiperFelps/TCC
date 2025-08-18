<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Plataforma ABC</h2></span>
        </div>
    </nav>

    <div class="pet_status">
        <img src="petCat.gif" alt="Pet" class="img-fluid"><br>

        <div style="display: flex; align-items: center; gap: 0.5vw;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fcc01e" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
            </svg>
            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" style="width: 50%"></div>
            </div>
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
            color: #388e3c;
            cursor: pointer;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
        // JS básico
        function jogar() {
            if (confirm("Você está pronto para jogar?")) {
                window.location.href = "#";
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
