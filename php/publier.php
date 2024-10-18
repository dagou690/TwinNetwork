<?php
session_start();

require_once("../dbconnect.php");  // connection bd

if (isset($_POST['content'])) {
    $content = htmlspecialchars($_POST['content']);
    $userId = $_SESSION['LOGIN_USER']['user_id'];
    $imagePath = null;

    // Vérification et traitement de l'image si elle est ajoutée
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = '' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    // Insertion dans la base de données
    $stmt = $conn->prepare('INSERT INTO publications (userId, content, image, date_pub) VALUES (?, ?, ?, NOW())');
    $stmt->execute([$userId, $content, $imagePath]);

    header('Location: publications.php');
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        body div {
            margin:50px;
            margin-left:25%;
        }



        #publication-form {
            width: 100%;
            max-width: 600px; /* Largeur maximale plus grande */
            background: #ffffff;
            padding: 30px; /* Augmentation du padding */
            border-radius: 15px; /* Coins plus arrondis */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Ombre plus douce */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transition ajoutée */
        }

        #publication-form:hover {
            transform: translateY(-5px); /* Déplacement léger au survol */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); /* Ombre plus marquée au survol */
        }

        #publication-form h2 {
            color: #333;
            text-align: center;
            font-size: 1.8em; /* Taille de police augmentée */
            margin-bottom: 20px; /* Plus d'espace sous le titre */
        }

        #publication-form textarea, #publication-form input[type="file"] {
            width: 100%;
            margin: 15px 0;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        #publication-form textarea:focus, #publication-form input[type="file"]:focus {
            border-color: #00796b; /* Changement de couleur au focus */
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transition ajoutée */
        }

        button:hover {
            background-color: #005b4f;
            transform: translateY(-2px); /* Légère élévation du bouton au survol */
        }

        button:active {
            transform: translateY(0); /* Effet d'enfoncement lors du clic */
        }
    </style>
</head>
<body>
    <?php require_once("nav.php"); ?>
    <div>
        <form id="publication-form" action="" method="POST" enctype="multipart/form-data">
            <h2>Publier un message</h2>
            <textarea name="content" rows="4" placeholder="Écrivez quelque chose..." required></textarea>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Publier</button>
        </form>
    </div>
</body>
</html>
