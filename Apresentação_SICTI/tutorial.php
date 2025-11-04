<?php
session_start();
include 'conexao.php';
$id = $_SESSION['id'] ?? null;
if (!$id) {
    header("Location: login.php");
    exit();
}
$stmt = $conn->prepare("SELECT numColor, numNivel FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numColor, $numNivel);
$stmt->fetch();
$stmt->close();
$colorCodes = ['#b5eac0', '#b5eac0', '#add8e6', '#ffb6c1'];
$corMenu = $colorCodes[$numColor ?? 0] ?? '#b5eac0';
$numNivel = $numNivel ?? 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizador - Nivel - Tutorial</title>
     <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"
  />
</head>
<body>
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
        .page_title {
            text-align: center;
            font-size: 2.5rem;
            margin-top: 20px;
            color: #111;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            margin-bottom: -30px;
        }

        .letras-container{
           position: relative;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 200px;
           flex-wrap: wrap; 
           margin-top: 45px;
        }

        .imagemA{
            width: 120px;
            height: auto;
            padding: 10px;
            position: absolute;
            margin-right:500px
        }
        .imagemE{
            width: 120px;
            height: auto;
            padding: 10px;
            margin-right: 230px;
            position: absolute;
        }
        .imagemI{
            width: 120px;
            height: 145px;
            padding: 10px;
            position: absolute;
        }
        .imagemO{
            width: 125px;
            height: 145px;
            padding: 10px;
            margin-right: -250px;
            position: absolute;
        }
        .imagemU{
            width: 125px;
            height: 145px;
            padding: 10px;
            margin-right: -500px;
            position: absolute;
        }
        .mute{
            background-color: white;
            cursor: pointer;
        }
        #playButton1 {
            position: relative;
            top: -20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: 31%;
            background-color: #b5eac0;
            &:hover {
                background-color: #d5e9d8ff;
            }
        }
        #playButton1 img {
            width: 30px;
            height: 30px;  
       }
        #playButton2 {
            position: relative;
            right: -110px;
            top: -80px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: 31%;
            background-color: #b5eac0;
            &:hover {
                background-color: #d5e9d8ff;
            }
        }
        #playButton2 img {
            width: 30px;
            height: 30px;
        }

         #playButton3 {
            position: relative;
            top: -140px;
            right: -235px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: 31%;
            background-color: #b5eac0;
            &:hover {
                background-color: #d5e9d8ff;
            }
        }
        #playButton3 img {
            width: 30px;
            height: 30px;
        }

             #playButton4 {
            position: relative;
            top: -200px;
            right: -350px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: 31%;
            background-color: #b5eac0;
            &:hover {
                background-color: #d5e9d8ff;
            }
        }
        #playButton4 img {
            width: 30px;
            height: 30px;
        }

          #playButton5 {
            position: relative;
            top: -258px;
            right: -475px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: 31%;
            background-color: #b5eac0;
            &:hover {
                background-color: #d5e9d8ff;
            }
        }
        #playButton5 img {
            width: 30px;
            height: 30px;
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
    </style>

    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Alfabetizador - TUTORIAL</h2></span>
        </div>
    </nav>
    <h1 class="page_title">VOGAIS</h1>

    <div class="letras-container">
<img src="letraA.png" alt="Large bold black uppercase letter A centered on a transparent background, no additional text or elements, neutral tone" class="imagemA">
<img src="letraE.png" alt="Large bold black uppercase letter E centered on a transparent background, no additional text or elements, neutral tone" class="imagemE">
<img src="letraI.png" alt="Large bold black uppercase letter I centered on a transparent background, no additional text or elements, neutral tone" class="imagemI">
<img src="letraO.png" alt="Large bold black uppercase letter O centered on a transparent background, no additional text or elements, neutral tone" class="imagemO">
<img src="letraU.png" alt="Large bold black uppercase letter U centered on a transparent background, no additional text or elements, neutral tone" class="imagemU">
    </div>

     <audio id="audioPlayer" src="SomA.mp3"></audio>
    <button id="playButton1" class="mute">
        <img src="auto.png" alt="Som">
    </button>

     <audio id="audioPlayer2" src="SomE.mp3"></audio>
    <button id="playButton2" class="mute">
       <img src="auto.png" alt="Som2">
     </button>

      <audio id="audioPlayer3" src="SomI.mp3"></audio>
    <button id="playButton3" class="mute">
       <img src="auto.png" alt="Som3">
     </button>

      <audio id="audioPlayer4" src="SomO.mp3"></audio>
    <button id="playButton4" class="mute">
       <img src="auto.png" alt="Som4">
     </button>

      <audio id="audioPlayer5" src="SomU.mp3"></audio>
    <button id="playButton5" class="mute">
       <img src="auto.png" alt="Som5">
     </button>

    <button onclick="Menu()" class="menu_button">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
    </button>
    <button onclick="Next()" class="next_button">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
        </svg>
    </button>


<script>
        document.getElementById('playButton1').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer');
            audio.play();
        });

        document.getElementById('playButton2').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer2');
            audio.play();
        });

         document.getElementById('playButton3').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer3');
            audio.play();
        });

          document.getElementById('playButton4').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer4');
            audio.play();
        });

           document.getElementById('playButton5').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer5');
            audio.play();
        });
        
        function Menu() {
          window.location.href = 'menu.php';
        }
        function Next() {
          window.location.href = 'exe.php';
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
            var next_button = document.querySelector('.next_button');
            if (next_button) {
                next_button.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var playButton1 = document.querySelector('#playButton1');
            if (playButton1) {
                playButton1.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var playButton2 = document.querySelector('#playButton2');
            if (playButton2) {
                playButton2.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var playButton3 = document.querySelector('#playButton3');
            if (playButton3) {
                playButton3.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var playButton4 = document.querySelector('#playButton4');
            if (playButton4) {
                playButton4.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var playButton5 = document.querySelector('#playButton5');
            if (playButton5) {
                playButton5.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            
        });
    </script>
</body>
</html>