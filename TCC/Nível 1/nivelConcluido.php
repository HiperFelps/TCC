<?php
session_start();
include 'conexao.php';

header('Content-Type: application/json');

// Verify user session
$id = $_SESSION['id'] ?? null;
if (!$id) {
    echo json_encode(['success' => false, 'error' => 'Usuário não autenticado']);
    exit();
}

// Get POST data
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método não permitido']);
    exit();
}

$user_id = $_POST['user_id'] ?? null;
if ($user_id != $id) { // Security: Ensure POST ID matches session
    echo json_encode(['success' => false, 'error' => 'ID inválido']);
    exit();
}

// Fetch current level and energy
$stmt = $conn->prepare("SELECT numNivel, numEnergia FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($numNivel, $numEnergia);
$stmt->fetch();
$stmt->close();

if ($numNivel != 1) {
    echo json_encode(['success' => false, 'error' => 'Não é o nível 1']);
    exit();
}

// Update: Increment level and add 1 energy (max 0, but assuming energy can't go negative)
$newNivel = $numNivel + 1;
$energyGain = 1;
$energiaAtual = max(0, $numEnergia + $energyGain);

$stmt = $conn->prepare("UPDATE usuarios SET numNivel = ?, numEnergia = ? WHERE id = ?");
$stmt->bind_param("iii", $newNivel, $energiaAtual, $id);
$success = $stmt->execute();
$stmt->close();

if ($success) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Erro no banco de dados']);
}
?>
