<?php
include('conexao.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) == 1){
        $usuario = mysqli_fetch_assoc($resultado);
    }else{
        echo "O contato não foi encontrado";
        exit;
    }
}

// Atualizar o contato
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $numCor = $_POST['numCor'];
    $numPet = $_POST['numPet'];
    $numNivel = $_POST['numNivel'];
    $numEnergia = $_POST['numEnergia'];

    $sql2 = "UPDATE usuarios SET id='$id', email='$email', numCor='$numCor', numPet='$numPet', numNivel='$numNivel', numEnergia='$numEnergia' WHERE id='$id'";

    if(mysqli_query($conn, $sql2)){
        echo "contato atualizado com sucesso <br>";
        echo "<a href='controle.php'>Voltar</a>";
        exit;
    }else{
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
        <h2 id="titulo">Editar Contato</h2>
        <div id="form">
        <form method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="id" class="labels">ID: </label><br>
        <input type="number" name="id" value="<?php echo $usuario['id'];?>" required><br><br>
        <label for="email" class="labels">Email: </label><br>
        <input type="email" name="email" value="<?php echo $usuario['email'];?>" required><br><br>
        <label for="numCor" class="labels">Cor: </label><br>
        <input type="number" name="numCor" value="<?php echo $usuario['numCor'];?>" required><br><br>
        <label for="numPet" class="labels">Pet: </label><br>
        <input type="number" name="numPet" value="<?php echo $usuario['numPet'];?>" required><br><br>
        <label for="numNivel" class="labels">Nível: </label><br>
        <input type="number" name="numNivel" value="<?php echo $usuario['numNivel'];?>" required><br><br>
        <label for="numEnergia" class="labels">Energia: </label><br>
        <input type="number" name="numEnergia" value="<?php echo $usuario['numEnergia'];?>" required><br><br>
        <input type="submit" name="atualizar" value="atualizar" id="button"><br><br>
        
        </form>
        </div>
            <a href="controle.php" id="link">Voltar</a>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }
            #titulo {
                color: #333;
                text-align: center;
            }
            #form {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                margin-left: 41%;
                margin-right: 41%;
                text-align: center;
            }
            #button {
                background-color: #007BFF;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-left: 25%;
                margin-right: 25%;
                cursor: pointer;
            }
            #link {
                text-decoration: none;
                color: #007BFF;
                font-weight: bold;
                text-align: center;
                display: block;
                margin-top: 20px;
            }
            .labels {
                color: #333;
                font-family: Arial, sans-serif;
                font-size: 16px;
            }
        </style>
</body>
</html>
