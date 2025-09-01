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
        header {
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
            margin-top: -40px; 
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

        .voltar {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            background-color: #d4f3d4; 
            border: none;
            border-radius: 8px; 
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .voltar:hover {
            background-color: #b8e6b8; 
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

    <header>Alfabetizador</header>

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

    <button class="voltar" onclick="voltar()">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
        </svg>
    </button>

    <div class="confete" id="confete"></div>

    <script>
        function mostrarMensagem(numero) {
            alert("Você clicou no número " + numero + "! Muito bem!");
            soltarConfetes();
        }

        function voltar() {
            alert("Voltando ao menu...");
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
