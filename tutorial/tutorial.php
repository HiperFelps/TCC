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
       
       body{
            background-color: #f0f0f0;



       }
       
       .container-fluid.full-width-container {
            background-color: #b5eac0;
            padding: 20px;
            height: 120px;
          

        }
        .text-center{
            color: #0f1113ff;
            text-align: center;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            font-size: 35px;
            margin-top: 10px;
            font-weight: bold;


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
        #playButton {
            position: relative;
            bottom: 20px;
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
        #playButton img {
            width: 30px;
            height: 30px;
            
           
       }
        #playButton2 {
            position: relative;
            bottom: 80px;
            right: -110px;
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
            bottom: 140px;
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
            bottom: 200px;
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
            bottom: 258px;
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


        
    </style>

     <div class="container-fluid full-width-container">
        <h1 class="text-center">Alfabetizador - TUTORIAL</h1>
    </div>

    <div class="letras-container">
<img src="letraA.png" alt="Large bold black uppercase letter A centered on a transparent background, no additional text or elements, neutral tone" class="imagemA">
<img src="letraE.png" alt="Large bold black uppercase letter E centered on a transparent background, no additional text or elements, neutral tone" class="imagemE">
<img src="letraI.png" alt="Large bold black uppercase letter I centered on a transparent background, no additional text or elements, neutral tone" class="imagemI">
<img src="letraO.png" alt="Large bold black uppercase letter O centered on a transparent background, no additional text or elements, neutral tone" class="imagemO">
<img src="letraU.png" alt="Large bold black uppercase letter U centered on a transparent background, no additional text or elements, neutral tone" class="imagemU">
    </div>

     <audio id="audioPlayer" src=""></audio>
    <button id="playButton" class="mute">
        <img src="auto.png" alt="Som">
    </button>

     <audio id="audioPlayer2" src=""></audio>
    <button id="playButton2" class="mute">
       <img src="auto.png" alt="Som2">
     </button>

      <audio id="audioPlayer3" src=""></audio>
    <button id="playButton3" class="mute">
       <img src="auto.png" alt="Som3">
     </button>

      <audio id="audioPlayer4" src=""></audio>
    <button id="playButton4" class="mute">
       <img src="auto.png" alt="Som4">
     </button>

      <audio id="audioPlayer5" src=""></audio>
    <button id="playButton5" class="mute">
       <img src="auto.png" alt="Som5">
     </button>


     <script src="script.js"></script>
</body>
</html>