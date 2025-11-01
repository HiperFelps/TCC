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
    <title>Encontro Vocálico</title>
      <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"
  />
</head>
<body>
   <style>
      body{
            background-color: #f0f0f0;
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

        #audioBtn {
            font-size: 24px;
            padding: 10px 20px;
            height: 100px;
            width: 100px;
            bottom: 20px;
            cursor: pointer;
            border: black 2px solid;
            margin-top: 140px;
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              background-color: #cbf11dff;
            &:hover {
                background-color: #bdc09eff;
            }
        }
            #audioBtn2 {
            font-size: 24px;
            padding: 10px 20px;
            height: 100px;
            width: 100px;
            bottom: 20px;
            cursor: pointer;
            border: black 2px solid;
            margin-top: 140px;
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              background-color: #46cf62ff;
            &:hover {
                background-color: #a3c2a7ff;
            } 
        }

            #audioBtn3 {
            font-size: 24px;
            padding: 10px 20px;
            height: 100px;
            width: 100px;
            bottom: 20px;
            cursor: pointer;
            border: black 2px solid;
            margin-top: 140px;
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              background-color: #cf4686ff;
            &:hover {
                background-color: #ad84a4ff;
            }
        }

            #audioBtn4 {
            font-size: 24px;
            padding: 10px 20px;
            height: 100px;
            width: 100px;
            bottom: 20px;
            cursor: pointer;
            border: black 2px solid;
            margin-top: 140px;
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
              background-color: #4846cfff;
            &:hover {
                background-color: #9186a3ff;
            }
        }

        #audioBtn, #audioBtn2, #audioBtn3, #audioBtn4 {
            color: #000000ff; 
            font-family: comic sans ms, sans-serif; 
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
    <h1 class="page_title">ENCONTROS VOCÁLICOS</h1>

 <div class="container text-center d-flex justify-content-center gap-4">
    <button id="audioBtn" class="btn btn-success">
        🔊 AE
    </button>
    <audio id="audioPlayer" src="ae.mp3"></audio>

    <button id="audioBtn2" class="btn btn-success">
        🔊 AI
    </button>
    <audio id="audioPlayer2" src="ai.mp3"></audio>
    <button id="audioBtn3" class="btn btn-success">
        🔊 AO
    </button>
    <audio id="audioPlayer3" src="ao.mp3"></audio>

     <button id="audioBtn4" class="btn btn-success">
        🔊 AU
    </button>
    <audio id="audioPlayer4" src="au.mp3"></audio>
</div>

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
        document.getElementById('audioBtn').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer');
            audio.play();
        });
        document.getElementById('audioBtn2').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer2');
            audio.play();
        });
        document.getElementById('audioBtn3').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer3');
            audio.play();
        });
        document.getElementById('audioBtn4').addEventListener('click', function() {
            var audio = document.getElementById('audioPlayer4');
            audio.play();
        });

          function Menu() {
          window.location.href = 'menu.php';
        }

           function Next() {
          window.location.href = 'exe3.php';
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
           
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     
</body>
</html>
