<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizador - Número 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; text-align: center; font-family: 'Comic Sans MS', cursive, sans-serif; }
        header { background-color: #a6dba8; padding: 15px; font-size: 2rem; font-weight: bold; color: #000; text-align: left; padding-left: 20px; }
        .container-principal { display: flex; justify-content: center; align-items: center; min-height: 75vh; flex-direction: column; }
        .titulo { font-size: 2.5rem; margin-bottom: 30px; font-weight: bold; }
        .numero { font-size: 3rem; font-weight: bold; color: white; background-color: #a6dba8; border-radius: 20px; padding: 20px; margin: 10px; display: inline-block; box-shadow: 4px 4px 8px rgba(0,0,0,0.2); cursor: pointer; transition: transform 0.3s; }
        .numero:hover { transform: scale(1.1); background-color: #8ccf90; }
        .macas img { width: 60px; margin: 5px; animation: bounce 1.5s infinite; }
        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .mensagem { margin-top: 20px; max-width: 400px; }
    </style>
</head>
<body>

    <header>Alfabetizador</header>

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

    <script>
        function verificar(numero) {
            const mensagem = document.getElementById("mensagem");
            mensagem.innerHTML = "";

            if (numero === 5) {
                mensagem.innerHTML = `<div class="alert alert-success" role="alert">
                    🎉 Parabéns! Você acertou!<br> Indo para o próximo desafio...
                </div>`;
                setTimeout(() => {
                    window.location.href = "numero1.php";
                }, 2000);
            } else {
                mensagem.innerHTML = `<div class="alert alert-danger" role="alert">
                    ❌ Tente novamente!
                </div>`;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>