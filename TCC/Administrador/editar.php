<?php
include('conexao.php');

$id = null;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$usuario = null;

if ($id) {
    $id = intval($id);
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "O usuário não foi encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não fornecido.";
    exit;
}

if (isset($_POST['atualizar'])) {
    $id = intval($_POST['id']);
    $numColor = mysqli_real_escape_string($conn, $_POST['numColor']);
    $numPet = mysqli_real_escape_string($conn, $_POST['numPet']);
    $numNivel = mysqli_real_escape_string($conn, $_POST['numNivel']);
    $numEnergia = mysqli_real_escape_string($conn, $_POST['numEnergia']);

    $sql2 = "UPDATE usuarios SET numColor='$numColor', numPet='$numPet', numNivel='$numNivel', numEnergia='$numEnergia' WHERE id='$id'";

    if (mysqli_query($conn, $sql2)) {
        header("Location: controle.php?updated=1");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn) . "<br>";
        echo "<a href='controle.php'>Voltar</a>";
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
    <h2 id="titulo">Editar Usuário</h2>
    <div class="form">
        <form method="post" action="editar.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
            <label for="numColor" class="labels">Cor: </label><br>
            <input class="inp" type="number" name="numColor" max=3 min=1 value="<?php echo htmlspecialchars($usuario['numColor']); ?>" required><br><br>
            <label for="numPet" class="labels">Pet: </label><br>
            <input class="inp" type="number" name="numPet" max=3 min=1 value="<?php echo htmlspecialchars($usuario['numPet']); ?>" required><br><br>
            <label for="numNivel" class="labels">Nível: </label><br>
            <input class="inp" type="number" name="numNivel" min=1 value="<?php echo htmlspecialchars($usuario['numNivel']); ?>" required><br><br>
            <label for="numEnergia" class="labels">Energia: </label><br>
            <input class="inp" type="number" name="numEnergia" max="5" min="1" value="<?php echo htmlspecialchars($usuario['numEnergia']); ?>" required><br><br>
            <input type="submit" name="atualizar" value="atualizar" class="button"><br><br>
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
        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-left: 41%;
            margin-right: 41%;
            text-align: center;
        }
        .inp {
            width: 100%;
            padding: 5px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button {
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
            border-radius: 4px;
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
            font-weight: bold;
            color: #555;
            text-align: left;
            display: block;
            margin-bottom: -15px;
        }
    </style>
</body>
</html>
