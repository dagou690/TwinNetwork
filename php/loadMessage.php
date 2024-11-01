<?php
session_start();
require_once("../dbconnect.php");  // connection bd

// Récupérer les messages avec le nom de l'utilisateur
$recupMessage = $conn->query('
    SELECT * FROM messages 
    INNER JOIN user ON messages.userId = user.idUser OR  messages.adminId = admin.idAdmin
    ORDER BY messages.date_envoi ASC
');

while ($message = $recupMessage->fetch()) {
    // Vérifier si le message est de l'utilisateur connecté
    if(isset($_SESSION['LOGIN_USER'])){
        $isUserMessage = ($message['userId'] == $_SESSION['LOGIN_USER']['user_id']);
        $messageClass = $isUserMessage ? 'user-message' : 'other-message';?>
        <div class="<?= $messageClass ?>">
        <h4><?= htmlspecialchars($message['Nom']); ?></h4>
        <p><?= htmlspecialchars($message['message']); ?></p>
        <small style="font-size : 10px; color: black;"><?= htmlspecialchars($message['date_envoi']); ?></small>
       </div>
    
    <?php
    } 
    else{
        $isAdminMessage = ($message['adminId'] == $_SESSION['LOGIN_ADMIN']['admin_id']);
        $messageClass = $isAdminMessage ? 'admin-message' : 'other-message';?>
        <div class="<?= $messageClass ?>">
        <h4><?= htmlspecialchars($message['Nom']); ?></h4>
        <p><?= htmlspecialchars($message['message']); ?></p>
        <small style="font-size : 10px; color: black;"><?= htmlspecialchars($message['date_envoi']); ?></small>
    </div>
    <?php
    }

    }
    ?>
    
    







