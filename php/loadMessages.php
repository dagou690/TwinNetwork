<?php
session_start();

require_once("../dbconnect.php");  // connection bd

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $currentUserId = $_SESSION['LOGIN_USER']['user_id'];

    // Récupération des messages entre l'utilisateur actuel et l'utilisateur sélectionné
    $stmt = $conn->prepare("
        SELECT * FROM messagesprive 
        WHERE (userId = :currentUserId AND recipientId = :userId)
           OR (userId = :userId AND recipientId = :currentUserId) 
        ORDER BY date_envoi
    ");
    $stmt->execute(['currentUserId' => $currentUserId, 'userId' => $userId]);

    while ($message = $stmt->fetch()) {
        // Détermine si le message est envoyé ou reçu
        $messageClass = ($message['userId'] == $currentUserId) ? 'sent' : 'received';
        
        // Affichage du message avec la classe appropriée et la date/heure
        echo '<div class="message ' . $messageClass . '">';
        echo htmlspecialchars($message['message']);
        echo '<br><small style="font-size: 10px; color: black;">' . date('d/m/Y H:i', strtotime($message['date_envoi'])) . '</small>';
        echo '</div>';
    }
}
?>
