
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
       
       .container-fluid.full-width-container {
            background-color: #b5eac0;
            padding: 20px;
            height: 120px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          

        }
        .text-center{
            color: #131414ff;
            text-align: center;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            font-size: 35px;
            margin-top: 10px;
            font-weight: bold;


        }

        #audioBtn {
            font-size: 24px;
            padding: 10px 20px;
            height: 100px;
            width: 100px;
            bottom: 20px;
            cursor: pointer;
            border: black 2px solid;
            margin-top: 100px;
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
            margin-top: 100px;
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
            margin-top: 100px;
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
            margin-top: 100px;
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
            color: #000000ff;           /* Cor do texto */
            font-family: comic sans ms, sans-serif; /* Fonte */
        }

       

       
    </style>


<div class="container-fluid full-width-container">
        <h1 class="text-center">Alfabetizador - ENCONTROS VOCÁLICOS</h1>
    </div>

 <div class="container text-center mt-4 d-flex justify-content-center gap-4">
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     
</body>
</html>
