<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie Privée</title>
    <style>
        /* Mise en page globale */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            
        }

        .bodydiv{
            display: flex;
            background-color: #f3f4f6;
            color: #333;
            
            
        }
        /* Liste des utilisateurs */
        .user-list {
            width: 25%;
            height: 459px;
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .user-item {
            padding: 12px;
            margin-bottom: 10px;
            background-color: #34495e;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .user-item:hover {
            background-color: #3b5998;
        }

        /* Fenêtre de chat */
        .chat-window {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 410px;
            background-color: #ecf0f1;
            overflow: hidden;
        }
        .messages {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            margin-bottom: 20px;
            scrollbar-width: none; /* Firefox */
        }
        .messages::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Edge */
        }

        /* Style des messages */
        .message {
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 20px;
            max-width: 70%;
            line-height: 1.4;
            position: relative;
            word-wrap: break-word;
        }

        /* Messages reçus */
        .message.received {
            background-color: #dfe6e9;
            float: left;
            clear: both;
        }

        /* Messages envoyés */
        .message.sent {
            background-color: #74b9ff;
            color: white;
            float: right;
            clear: both;
        }

        /* Formulaire de message */
        .message-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .message-form input[type="text"] {
            flex: 1;
            padding: 12px;
            border-radius: 20px;
            border: 1px solid #ddd;
            outline: none;
        }
        .message-form button {
            padding: 12px 18px;
            border: none;
            border-radius: 20px;
            background-color: #0984e3;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php require_once("nav.php"); ?>
<div class="bodydiv">
    <div class="user-list" id="userList">
        <!-- Liste des utilisateurs - Remplissez dynamiquement avec PHP et AJAX -->
        <div class="user-item" onclick="selectUser(1)">Utilisateur 1</div>
        <div class="user-item" onclick="selectUser(2)">Utilisateur 2</div>
    </div>

    <div class="chat-window" id="chatWindow">
        <div class="messages" id="messages">
            <!-- Les messages seront chargés ici dynamiquement -->
        </div>
        <form class="message-form" onsubmit="return sendMessage();" id="messageForm">
            <input type="text" id="messageContent" placeholder="Écrire un message" required>
            <button type="submit">Envoyer</button>
        </form>
    </div>

    </div>

    <script>
        let selectedUserId = null;

        // Charger la liste des utilisateurs au chargement de la page
        document.addEventListener("DOMContentLoaded", () => {
            loadUserList();
        });

        // Charger la liste des utilisateurs
        function loadUserList() {
            fetch('userList.php') 
                .then(response => response.text())
                .then(data => {
                    document.getElementById('userList').innerHTML = data;
                });
        }

        // Sélectionner un utilisateur
        function selectUser(userId) {
            selectedUserId = userId;
            loadMessages(userId);
        }

        // Charger les messages pour l'utilisateur sélectionné
        function loadMessages(userId) {
            fetch(`loadMessages.php?userId=${userId}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('messages').innerHTML = data;
                    document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
                });
        }

        // Envoyer un message
        function sendMessage() {
            const messageContent = document.getElementById('messageContent').value;
            if (selectedUserId && messageContent) {
                fetch('sendMessage.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `recipientId=${selectedUserId}&messageContent=${encodeURIComponent(messageContent)}`
                })
                .then(response => response.text())
                .then(() => {
                    document.getElementById('messageContent').value = '';
                    loadMessages(selectedUserId); // Recharger les messages
                });
            }
            return false; // Empêcher le rechargement de la page
        }
    </script>

</body>
</html>
