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
$numNivel = $numNivel ?? 1;
$corMenu = $colorCodes[$numColor ?? 0] ?? '#b5eac0';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizador - Número 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; text-align: center; font-family: 'Comic Sans MS', cursive, sans-serif; }
        .header { background-color: #a6dba8; padding: 15px; font-size: 2rem; font-weight: bold; color: #000; text-align: left; padding-left: 20px; }
        .container-principal { display: flex; justify-content: center; align-items: center; min-height: 75vh; flex-direction: column; }
        .titulo { font-size: 2.5rem; margin-bottom: 30px; font-weight: bold; }
        .numero { font-size: 3rem; font-weight: bold; color: white; background-color: #a6dba8; border-radius: 20px; padding: 20px; margin: 10px; display: inline-block; box-shadow: 4px 4px 8px rgba(0,0,0,0.2); cursor: pointer; transition: transform 0.3s; }
        .numero:hover { transform: scale(1.1); background-color: #8ccf90; }
        .macas img { width: 60px; margin: 5px; animation: bounce 1.5s infinite; }
        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .mensagem { margin-top: 20px; max-width: 400px; }
        .menu_button { background-color: #b5eac0; color: #333; font-size: 1.2rem; font-family: 'Comic Sans MS', 'Comic Sans', cursive; border: none; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.12); cursor: pointer; transition: background 0.2s, color 0.2s; padding: 12px 32px; position: fixed; left: 1vw; bottom: 2vh; margin: 0; z-index: 1000; display: flex; align-items: center;}
        .menu_button:hover { background-color: #e0e0e0; cursor: pointer;}
    </style>
</head>
<body>

    <header class="header">Alfabetizador</header>

    <div class="container-principal">
        <h2 class="titulo">Quantas maçãs tem?</h2>

        <div class="macas">
            <?php 
            for ($i = 0; $i < 5; $i++) {
                echo '<img src="https://cdn-icons-png.flaticon.com/512/415/415733.png" alt="maçã">';
            }
            ?>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                    echo '<div class="col-4 col-md-2 mb-3">
                            <div class="numero" onclick="verificar('.$i.')">'.$i.'</div>
                          </div>';
                }
                ?>
            </div>
        </div>

        <div class="mensagem" id="mensagem"></div>
    </div>
    <button onclick="voltar()" class="menu_button">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
        </svg>
    </button>

    <script>
        var userId = <?php echo json_encode($id); ?>;
        var currentLevel = <?php echo json_encode($numNivel); ?>;

        function voltar() {
            window.location.href = "menu.php";
        }
        function verificar(numero) {
            const mensagem = document.getElementById("mensagem");
            mensagem.innerHTML = "";

            if (numero === 5) {
                mensagem.innerHTML = `<div class="alert alert-success" role="alert">
                    🎉 Parabéns! Você acertou!<br> Nível finalizado, voltando ao Menu...
                </div>`;
                setTimeout(() => {
                    updateLevelAndEnergy();
                    window.location.href = "menu.php";
                }, 2000);
            } else {
                mensagem.innerHTML = `<div class="alert alert-danger" role="alert">
                    ❌ Tente novamente!
                </div>`;
            }
        }
        function updateLevelAndEnergy() {
            if (currentLevel !== 2) {
                console.log('Level update skipped: Not on level 2');
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'nivel2Concluido.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        console.log('Nível e energia atualizados com sucesso.');
                        currentLevel = currentLevel + 1; // Update local variable
                    } else {
                        console.error('Update failed: ' + response.error);
                        alert('Erro ao atualizar progresso. Tente novamente.');
                    }
                }
            };
            xhr.send('user_id=' + encodeURIComponent(userId));
        }
        document.addEventListener('DOMContentLoaded', function() {
            var header = document.querySelector('.header');
            if (header) {
                header.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var menu_button = document.querySelector('.menu_button');
            if (menu_button) {
                menu_button.style.backgroundColor = "<?php echo $corMenu; ?>";
            }
            var numero = document.querySelectorAll('.numero');
                numero.forEach(function(button) {
                button.style.backgroundColor = "<?php echo $corMenu; ?>";
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
