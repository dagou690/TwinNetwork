<?php
session_start();
include('../dbconnect.php'); // Fichier de connexion à la base de données

// Vérification de la session utilisateur
if (!isset($_SESSION['LOGIN_USER'])) {
    header("Location: connexion.php"); // Rediriger si non connecté
    exit();
}

// Récupération de l'ID de l'utilisateur connecté
$user_id = $_SESSION['LOGIN_USER']['user_id'];

// Préparation de la requête pour récupérer les informations de l'utilisateur
$stmt = $conn->prepare("SELECT * FROM user WHERE idUser = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification si les informations ont bien été récupérées
if (!$user) {
    echo "Erreur : utilisateur non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Carte profil */
        .profile-card {
            background-color: #2c3e50;
            color: #ecf0f1;
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Style pour le titre */
        .profile-card h2 {
            color: #f1c40f;
            margin-bottom: 15px;
            font-size: 1.8em;
        }

        /* Informations de profil */
        .profile-info {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Ligne d'information */
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #3BBEE6;
        }

        /* Etiquette et valeur */
        .info-label {
            font-weight: bold;
            color: #ecf0f1;
        }

        .info-value {
            color: #f1c40f;
            text-align: right;
        }

        /* Bouton de retour */
        .back-button {
            margin-top: 20px;
            background-color: #3BBEE6;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <h2>Profil de <?php echo htmlspecialchars($user['Prenom']); ?></h2>
        <div class="profile-info">
            <div class="info-row">
                <span class="info-label">Nom :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['Nom']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Prénom :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['Prenom']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Email :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['Email']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Téléphone :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['telUser']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Ville :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['villeUser']); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Promotion :</span>
                <span class="info-value"><?php echo htmlspecialchars($user['promotionUser']); ?></span>
            </div>
        </div>
        <a href="index.php" class="back-button">Retour à l'accueil</a>
    </div>
</body>
</html>
