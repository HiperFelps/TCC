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
        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 220px;
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

    <div class="back-button">
        <div class="button" onclick="confirmAndBack()">←</div>
    </div>

    <audio id="audioA" src="letra a.ogg"></audio>
    <audio id="audioE" src="sletra E.ogg"></audio>
    <audio id="audioI" src="letra i.ogg"></audio>
    <audio id="audioO" src="letra o.ogg"></audio>
    <audio id="audioU" src="letra u.ogg"></audio>
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

        function back() {
            
            alert("Voltando...");
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
