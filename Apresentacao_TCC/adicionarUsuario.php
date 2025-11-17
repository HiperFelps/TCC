<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $consulta = "SELECT  * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($consulta);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('❌ Erro: Email já cadastrado!');</script>";
    }
    else{
        $sql = "INSERT INTO usuarios (email, senha, numPet, numColor, numNivel, numEnergia) VALUES (?, ?, ?, ?, ?, ?)";
        $numPet = 1;
        $numColor = 1;
        $numNivel = 1;
        $numEnergia = 0;
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param("ssiiii", $email, $senha, $numPet, $numColor, $numNivel, $numEnergia);
        if ($stmt2->execute()) {
            header("Location: controle.php");
            exit();
        } else {
            echo "<script>alert('❌ Erro: Erro ao inserir usuário');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvando o Usuário</title>
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