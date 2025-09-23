<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizador</title>
    <style>
        .navbar {
            background-color: #b5eac0;
            width: 100vw;
            height: 12vh;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .container-fluid {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 10vh;
            padding: 0;
            margin: 0;
        }
        .top_title {
            font-size: 3rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .button {
            background-color: #98e0a2;
            border: 2px solid #78c8a1;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            cursor: pointer;
            font-size: 24px;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .button:hover {
            background-color: #82d694;
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
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
                <h2 class="top_title">Alfabetizador</h2>
            </span>
        </div>
    </nav>

    <div id="buttons" style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
        <div class="button" onclick="playRandomVowel()" style="width: 220px; font-size: 32px;">🔊</div>
        <div style="display: flex; flex-direction: row; gap: 10px;">
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div class="button" onclick="confirmAndPlay('A')">A</div>
                <div class="button" onclick="confirmAndPlay('E')">E</div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div class="button" onclick="confirmAndPlay('I')">I</div>
                <div class="button" onclick="confirmAndPlay('O')">O</div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div class="button" onclick="confirmAndPlay('U')">U</div>
            </div>
        </div>
    </div>

    <button onclick="Menu()" class="menu_button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
      </svg>
      Voltar ao Menu Principal
    </button>

    <audio id="audioA" src="somA.mp3"></audio>
    <audio id="audioE" src="somE.mp3"></audio>
    <audio id="audioI" src="somI.mp3"></audio>
    <audio id="audioO" src="somO.mp3"></audio>
    <audio id="audioU" src="somU.mp3"></audio>
    <audio id="buttonClickSound" src="sounds/button-click.mp3"></audio> 
    <audio id="correctSound" src="sounds/correct.mp3"></audio> 

    <script>
        var expectedVowel = null;

        function playSound(letter) {
            var validLetters = ['A', 'E', 'I', 'O', 'U'];
            if (validLetters.includes(letter)) {
                var audio = document.getElementById("audio" + letter);
                if (audio) {
                    audio.currentTime = 0;
                    audio.play();
                }
            }
        }

        function playRandomVowel() {
            var vowels = ['A', 'E', 'I', 'O', 'U'];
            var previousVowel = expectedVowel;
            var randomIndex;
            do {
                randomIndex = Math.floor(Math.random() * vowels.length);
            } while (vowels[randomIndex] === previousVowel);
            expectedVowel = vowels[randomIndex];
            playSound(expectedVowel);
            alert('Ouça o som e clique na letra correspondente!');
        }

        function restartPhase() {
            expectedVowel = null;
            setTimeout(function() {
                playRandomVowel();
            }, 500); 
        }

        function playCorrectSound() {
            var correctSound = document.getElementById("correctSound");
            if (correctSound) {
                correctSound.currentTime = 0;
                correctSound.play();
            }
        }

        function Menu() {
            window.location.href = 'menu.php';            
        }

        function confirmAndPlay(letter) {
            if (confirm('Tem certeza que deseja acionar o botão ' + letter + '?')) {
                playSound(letter);
                playButtonClickSound();
                if (expectedVowel) {
                    if (letter === expectedVowel) {
                        playCorrectSound();
                        alert('Parabéns! Você acertou!');
                        restartPhase();
                    } else {
                        alert('Tente novamente!');
                        restartPhase();
                    }
                }
            }
        }

        function confirmAndBack() {
            if (confirm('Tem certeza que deseja voltar?')) {
                back();
            }
        }

        function playButtonClickSound() {
            var buttonClickSound = document.getElementById("buttonClickSound");
            buttonClickSound.currentTime = 0;
            buttonClickSound.play();
        }
    </script>
</body>
</html>
