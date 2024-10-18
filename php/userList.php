<?php
session_start(); // Démarrer la session

// Inclure le fichier de connexion à la base de données et les fonctions
require_once("../dbconnect.php");  // connection bd
require_once("fonction.php"); // Fichier contenant la fonction redirectToUrl()

$userId = $_SESSION['LOGIN_USER']['user_id'];

$stmt = $conn->prepare("SELECT idUser, Nom FROM user WHERE idUser != ?");
$stmt->execute([$userId]);

while ($user = $stmt->fetch()) {
    echo '<div class="user-item" onclick="selectUser(' . $user['idUser'] . ')">' . htmlspecialchars($user['Nom']) . '</div>';
}
?>
