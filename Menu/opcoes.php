<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">    
</head>
<body>
   <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Opções</h2></span>
        </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="opcoes-pet">
            <h2 class="titulo">Pet</h2>
            <button type="button" class="pet_button" onclick="ChangePet()">
              <img src="#" alt="Pet">
            </button>
          </div>
        </div>
            <div class="col-md-6">
                <div class="opcoes-cor">
                  <h2 class="titulo">Fundo</h2>
                  <div class="color-buttons">
                    <button class="green_button" onclick="ChangeGreen()"></button>
                    <button class="blue_button" onclick="ChangeBlue()"></button>
                    <button class="pink_button" onclick="ChangePink()"></button>
                </div>
                  
                </div>
            </div>
        </div>
    </div>
        <button onclick="Menu()" class="menu-button"">
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
        .opcoes-pet {
            margin-left: 8vw;
            margin-top: 8vh;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding-top: 1vh;
            padding-bottom: 5vh;
            padding-left: 1vw;
            padding-right: 2vw;
            display: inline-block;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 20vh;
            min-width: 18vw
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .opcoes-cor {
            margin-left: 8vw;
            margin-top: 8vh;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding: 16px;
            display: inline-block;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-width: 18vw;
            min-height: 24vh;
            padding: 24px;
            
        }
        .titulo {
            font-size: 2rem;
        }
        img {
            width: 200px;
            height: auto;
        }
        button {
            margin-top: 1vh;
        }
        .pet_button {
            width: 200px;
            height: 200px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .green_button{
            width: 50px;
            height: 50px;
            background-color: #b5eac0; /* Green */
            border: none;
            border-radius: 10px;
        }
        .blue_button{
            width: 50px;
            height: 50px;
            background-color: #add8e6; /* Blue */
            border: none;
            border-radius: 10px;
        }
        .pink_button{
            width: 50px;
            height: 50px;
            background-color: #ffb6c1; /* Pink */
            border: none;
            border-radius: 10px;
        }
        .menu-button {
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
        .color-buttons {
            display: flex;
            gap: 10px;
        }
        .menu-button:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

      </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        // Bootstrap JS
    </script>
    <script>
      // JS básico
      function Menu() {
          window.location.href = 'menu.php';
      }
      function ChangePet() {
        const petImg = document.querySelector('.pet_button img');
        if (petImg.src.includes('petCat.gif')) {
          petImg.src = 'petDino.gif';
        } else if (petImg.src.includes('petDino.gif')) {
          petImg.src = 'pet.gif';
        } else {
          petImg.src = 'petCat.gif';
        }
      }
    function ChangeGreen() {
        const navbar = document.querySelector('.navbar');
        const menuButton = document.querySelector('.menu-button');
        if (navbar) {
            navbar.style.backgroundColor = '#b5eac0'; // Green
        }
        if (menuButton) {
            menuButton.style.backgroundColor = '#b5eac0'; // Green
        }
    }
    function ChangeBlue() {
        const navbar = document.querySelector('.navbar');
        const menuButton = document.querySelector('.menu-button');
        if (navbar) {
            navbar.style.backgroundColor = '#add8e6'; // Blue
        }
        if (menuButton) {
            menuButton.style.backgroundColor = '#add8e6'; // Blue
        }
    }
    function ChangePink() {
        const navbar = document.querySelector('.navbar');
        const menuButton = document.querySelector('.menu-button');
        if (navbar) {
            navbar.style.backgroundColor = '#ffb6c1'; // Pink
        }
        if (menuButton) {
            menuButton.style.backgroundColor = '#ffb6c1'; // Pink
        }
    }
    </script>
</body>
</html>

