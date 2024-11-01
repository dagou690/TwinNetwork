<?php
session_start();

require_once("../dbconnect.php");  // connection bd

if(isset($_SESSION['LOGIN_USER']['user_id'])){
    if (isset($_POST['message'])) {
        $userId = $_SESSION['LOGIN_USER']['user_id'];
        $messageContent = htmlspecialchars($_POST['message']);
    
        $insertMessage = $conn->prepare('INSERT INTO messages (userId, message, date_envoi) VALUES (?, ?, NOW())');
        if (!$insertMessage->execute([$userId, $messageContent])) {
            die('Erreur lors de l\'insertion du message.');
        }
    }
}
elseif(isset($_SESSION['LOGIN_ADMIN']['admin_id'])){
    if (isset($_POST['message'])) {
        $adminId = $_SESSION['LOGIN_ADMIN']['admin_id'];
        $messageContent = htmlspecialchars($_POST['message']);
    
        $insertMessage = $conn->prepare('INSERT INTO messages (adminId, message, date_envoi) VALUES (?, ?, NOW())');
        if (!$insertMessage->execute([$adminId, $messageContent])) {
            die('Erreur lors de l\'insertion du message.');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Instantanée</title>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        
        /* En-tête */
        header {
            width: 100%;
            color: white;
            text-align: center;
        }

        /* Conteneur de la messagerie */
        #chat-container {
            width: 98%;
            /* max-width: 100%; */
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        
        /* Section des messages */
        #messages {
            padding: 8px;
            height: 400px;
            overflow-y: auto;
            flex: 1;
            background-color: #f8f9fa;
            scrollbar-width: none; /* Firefox */
        }
        #messages::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Edge */
        }

        /* Messages */
        .user-message, .admin-message, .other-message {
            border-radius: 15px;
            padding: 12px 18px;
            max-width: 30%;
            margin-bottom: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            word-wrap: break-word;
        }
        .user-message, .admin-message {
            background-color: #3BBEE6;
            margin-left: auto;
            text-align: right;
            color: #ffffff;
        }
        .other-message {
            background-color: #2c3e50;
            text-align: left;
            color: #ffffff;
        }

        /* Nom et date des messages */
        .user-message h4, .admin-message .h4, .other-message h4 {
            margin: 0 0 5px;
            font-size: 1em;
            font-weight: bold;
        }
        .user-message small, .admin-message small, .other-message small {
            font-size: 0.8em;
            color: #777;
        }

        /* Formulaire de message */
        #message-form {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
        }
        textarea {
            flex: 1;
            padding: 12px;
            border-radius: 15px;
            border: 1px solid #ddd;
            resize: none;
            font-size: 16px;
            margin-right: 10px;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        button {
            background: #3BBEE6;
            color: white;
            border: none;
            border-radius: 10%;
            padding: 12px;
            cursor: pointer;
            font-size: 18px;
            width: 100px;
            height: 44px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php require_once("nav.php"); ?>
    <div id="chat-container">
        <section id="messages">
        <?php
            $recupMessage = $conn->query('SELECT * FROM messages ORDER BY date_envoi DESC');
            while ($message = $recupMessage->fetch()) {
                if(isset($_SESSION['LOGIN_USER'])){
                    $formattedDate = date('d/m/Y H:i', strtotime($message['date_envoi']));
                    if ($message['userId'] == $_SESSION['LOGIN_USER']['user_id']) {
                        echo '<div class="user-message"><h4>Vous :</h4><p>' . htmlspecialchars($message['message']) . '</p><small style="color: black;">' . $formattedDate . '</small></div>';
                    } else {
                        echo '<div class="other-message"><h4>' . htmlspecialchars($message['pseudo']) . ' :</h4><p>' . htmlspecialchars($message['message']) . '</p><small>' . $formattedDate . '</small></div>';
                    }
                }
                elseif (isset($_SESSION['LOGIN_ADMIN'])){
                    $formattedDate = date('d/m/Y H:i', strtotime($message['date_envoi']));
                    if ($message['adminId'] == $_SESSION['LOGIN_ADMIN']['admin_id']) {
                        echo '<div class="admin-message"><h4>Vous :</h4><p>' . htmlspecialchars($message['message']) . '</p><small style="color: black;">' . $formattedDate . '</small></div>';
                    } else {
                        echo '<div class="other-message"><h4>' . htmlspecialchars($message['pseudo']) . ' :</h4><p>' . htmlspecialchars($message['message']) . '</p><small>' . $formattedDate . '</small></div>';
                    }
                }
               
            }
        ?>
        </section>
        <form method="POST" action="" id="message-form">
            <textarea name="message" placeholder="Votre message" required></textarea>
            <button type="submit" name="valider">Envoyer</button>
        </form>
    </div>

    <script>
        function load_message() {
            $('#messages').load('loadMessage.php');
        }

        $(document).ready(function() {
            setInterval(load_message, 3000); // Rafraîchit toutes les 3 secondes
            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '', // Envoi vers la même page
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function() {
                        $('textarea[name="message"]').val(''); // Réinitialise le champ de message
                        load_message(); // Recharge les messages après l'envoi
                    }
                });
            });
        });
    </script>
</body>
</html>
