<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle</title>
</head>
<body>
    <h1 id="title">Cadastrar Usuário</h1>
    <div id="form">
    <form action="adicionarUsuario.php" method="post">
        <label for="email">Email: </label><br>
        <input class="inp" type="email" id="email" name="email" required><br><br>
        <label for="senha">Senha: </label><br>
        <input class="inp" type="text" id="senha" name="senha" required><br><br>
        <input type="submit" value="Submit" id="button"><br><br>
    </form>
    </div>
    <h2 id="lista">Lista de Usuários</h2>
    <div id="usuarios">
    <?php
    include('conexao.php');

    $sql = "SELECT * FROM usuarios";

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo $linha['id'] . " | " . $linha['email'] . "   <br><a href='editar.php?id=" . $linha["id"] . 
            "'>Editar</a> <a href='excluir.php?id=" . $linha["id"] . "'>  Excluir</a><br>";
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
    ?>
    </div>

     <button onclick="Login()" class="login_button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
      </svg>
      Voltar à página de login
    </button>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        #title {
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
        #lista {
            color: #333;
            text-align: center;
        }
        #usuarios {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 40%;
            margin-right: 40%;
        }
        .inp {
            width: 100%;
            padding: 5px;
            margin: 5px 0 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 25%;
            margin-right: 25%;
            }
            #button:hover {
                font-weight: bold;
                background-color: #339cff;
                color: white;
                timeing: 0.3s;
        }
        .login_button {
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            font-family: Arial, sans-serif;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            padding: 10px 24px;
            position: fixed;
            left: 24px;
            bottom: 24px;
            margin: 0;
            display: block;
            z-index: 1000;
        }
        .login_button:hover {
            background-color: #339cff;
            font-weight: bold;
        }
    </style>  
    <script>
        function Login() {
            window.location.href = 'loginAdministrador.php';
        }
    </script>  
</body>
</html>