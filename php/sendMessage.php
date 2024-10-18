<?php
session_start();
require_once("fonction.php"); // Fichier de connexion

// Vérifier si l'utilisateur est connecté et si le message est défini
if (isset($_SESSION['LOGIN_USER']['user_id']) && isset($_POST['recipientId']) && isset($_POST['messageContent'])) {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=twinnetwork;charset=utf8', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $senderId = $_SESSION['LOGIN_USER']['user_id'];
        $recipientId = $_POST['recipientId'];
        $messageContent = htmlspecialchars($_POST['messageContent']);

        // Préparation de la requête d'insertion
        $insertMessage = $conn->prepare('INSERT INTO messagesprive (userId, message, date_envoi, recipientId) VALUES (?, ?, NOW(), ?)');
        if ($insertMessage->execute([$senderId, $messageContent, $recipientId])) {
            echo "Message envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
} else {
    echo "Requête invalide.";
}
?>
