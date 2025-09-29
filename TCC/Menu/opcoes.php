<?php
session_start();
include 'conexao.php'; // $conn is your connection variable
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><h2 class="top_title">Opções</h2></span>
        </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="opcoes-pet">
            <h2 class="titulo">Pet</h2>
            <button type="button" class="pet_button" onclick="ChangePet()">
              <img src="petCat.gif" alt="Pet">
            </button>
          </div>
        </div>
        <div class="col-md-6">
            <div class="opcoes-cor">
              <h2 class="titulo">Fundo</h2>
              <div class="color-buttons">
                <button class="green_button" onclick="ChangeGreen()"></button>
                <button class="blue_button" onclick="ChangeBlue()"></button>
                <button class="pink_button" onclick="ChangePink()"></button>
              </div>
            </div>
        </div>
      </div>
    </div>
    <button onclick="Menu()" class="menu_button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
      </svg>
      Voltar ao Menu Principal
    </button>

    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
        }
        .navbar {
            background-color: #b5eac0;
            width: 100vw;
            height: auto;
            padding-bottom: 1vh;
        }
        .container-fluid {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 10vh;
            padding-bottom: 1vh;
            padding-left: 1vw;
        }
        .top_title {
            font-size: 3rem;
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            margin-top: -1vh;
            margin-left: 1vw;
            margin-bottom: 1vh;
        }
        .opcoes-pet {
            margin-left: 8vw;
            margin-top: 8vh;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding-top: 1vh;
            padding-bottom: 5vh;
            padding-left: 1vw;
            padding-right: 2vw;
            display: inline-block;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 20vh;
            min-width: 18vw;
            max-width: 18vw;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .opcoes-cor {
            margin-left: 8vw;
            margin-top: 8vh;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding: 16px;
            display: inline-block;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-width: 18vw;
            min-height: 24vh;
            padding: 24px;
        }
        .titulo {
            font-size: 2rem;
        }
        img {
            width: 200px;
            height: auto;
        }
        button {
            margin-top: 1vh;
        }
        .pet_button {
            width: 200px;
            height: 200px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .green_button{
            width: 50px;
            height: 50px;
            background-color: #b5eac0;
            border: none;
            border-radius: 10px;
        }
        .blue_button{
            width: 50px;
            height: 50px;
            background-color: #add8e6;
            border: none;
            border-radius: 10px;
        }
        .pink_button{
            width: 50px;
            height: 50px;
            background-color: #ffb6c1;
            border: none;
            border-radius: 10px;
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
        .color-buttons {
            display: flex;
            gap: 10px;
        }
        .menu_button:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function Menu() {
          window.location.href = 'menu.php';
      }
    </script>
<?php
// Handle AJAX requests to save options
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $id = $_SESSION['id'] ?? null; // Get the current user's ID from the session
    if (!$id) {
        die('Usuário não logado.'); // Handle the case where the user is not logged in
    }
    
    if (!isset($conn) || !$conn) {
        die('Conexão com o banco de dados não estabelecida.');
    }

    if ($_POST['action'] === 'save_pet' && isset($_POST['pet'])) {
        $numPet = 0;
        switch ($_POST['pet']) {
            case 'petCat.gif': $numPet = 1; break;
            case 'petDino.gif': $numPet = 2; break;
            case 'petCapi.gif': $numPet = 3; break;
            case 'pet.gif': default: $numPet = 0; break;
        }
        $stmt = $conn->prepare("UPDATE usuarios SET numPet = ? WHERE id = ?");
        $stmt->bind_param("ii", $numPet, $id);
        $stmt->execute();
        exit;
    }

    if ($_POST['action'] === 'save_color' && isset($_POST['color'])) {
        $numColor = 0;
        switch ($_POST['color']) {
            case '#b5eac0': $numColor = 1; break;
            case '#add8e6': $numColor = 2; break;
            case '#ffb6c1': $numColor = 3; break;
            default: $numColor = 0; break;
        }
        $stmt = $conn->prepare("UPDATE usuarios SET numColor = ? WHERE id = ?");
        $stmt->bind_param("ii", $numColor, $id);
        $stmt->execute();
        exit;
    }
}

// Load saved options for the user
$id = $_SESSION['id'] ?? null; // Get the current user's ID from the session
if (!$id) {
    die('Usuário não logado.'); // Handle the case where the user is not logged in
}
if (!isset($conn) || !$conn) {
    die('Conexão com o banco de dados não estabelecida.');
}
$stmt = $conn->prepare("SELECT numPet, numColor FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numPet, $numColor);
$stmt->fetch();
$stmt->close();

// Map pet and color
$petFiles = ['pet.gif', 'petCat.gif', 'petDino.gif', 'petCapi.gif'];
$colorCodes = ['#b5eac0', '#b5eac0', '#add8e6', '#ffb6c1'];
$petFile = $petFiles[$numPet ?? 0] ?? 'pet.gif';
$colorCode = $colorCodes[$numColor ?? 1] ?? '#b5eac0';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set initial pet image
    const petImg = document.querySelector('.pet_button img');
    petImg.src = '<?php echo $petFile; ?>';

    // Set initial color
    const navbar = document.querySelector('.navbar');
    const menuButton = document.querySelector('.menu_button');
    <?php if ($colorCode): ?>
        if (navbar) navbar.style.backgroundColor = '<?php echo $colorCode; ?>';
        if (menuButton) menuButton.style.backgroundColor = '<?php echo $colorCode; ?>';
    <?php endif; ?>
});

// Save pet selection to database
function ChangePet() {
    const petImg = document.querySelector('.pet_button img');
    let newPet;
    if (petImg.src.includes('petCat.gif')) {
        newPet = 'petDino.gif';
    } else if (petImg.src.includes('petDino.gif')) {
        newPet = 'petCapi.gif';
    } else if( petImg.src.includes('petCapi.gif')) {
        newPet = 'petCat.gif';
    }else {
        newPet = 'petCat.gif';
    }

    petImg.src = newPet;
    saveOption('save_pet', 'pet', newPet);
}

// Save color selection to database
function ChangeGreen() { setColor('#b5eac0'); }
function ChangeBlue() { setColor('#add8e6'); }
function ChangePink() { setColor('#ffb6c1'); }
function setColor(color) {
    const navbar = document.querySelector('.navbar');
    const menuButton = document.querySelector('.menu_button');
    if (navbar) navbar.style.backgroundColor = color;
    if (menuButton) menuButton.style.backgroundColor = color;
    saveOption('save_color', 'color', color);
}

// AJAX function to save options
function saveOption(action, key, value) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'opcoes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('action=' + encodeURIComponent(action) + '&' + key + '=' + encodeURIComponent(value));
}
</script>
</body>
</html>