<?php
include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<h2 id='h2'>Contato excluído com sucesso!</h2>";
    echo "<br><a href='controle.php' id='link'>Voltar</a>";
} else {
    echo "Erro ao excluir: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluindo o Usuário</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            color: #333;
            text-align: center;
        }
        #h2 {
            color: #333;
            text-align: center;
        }
        #link {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</body>
</html>