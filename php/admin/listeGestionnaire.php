<?php
session_start();
include '../dbconnect.php'; // Inclusion du fichier de connexion
require_once("../fonction.php");

if(!isset($_SESSION['LOGIN_ADMIN'])){
    redirectToUrl('loginAdmin.php');
}

$sql = "SELECT * FROM gestionnaire";
$stmt = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir les Gestionnaires de Contenu</title>
    <style>
        /* Style général pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        /* Conteneur principal */
        .container {
            width: 90%;
            max-width: 900px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Titre de la page */
        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Style des boutons */
        .button-container {
            text-align: left;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
        }

    
        /* Style de la table */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table thead th {
            background-color: #3BBEE6;
            color: #ffffff;
            text-transform: uppercase;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Centrer le texte si aucune donnée n'est trouvée */
        .text-center {
            text-align: center;
            color: #2c3e50;
            font-weight: bold;
        }

        /* Police et couleur des lignes */
        .table tbody td {
            font-size: 15px;
            color: #333;
        }

        /* Légère animation au survol */
        .table tbody tr:hover td {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 class="text-center">Liste des Gestionnaires de Contenu</h2><br><br>
        
        <!-- Boutons d'ajout -->
        <div class="button-container">
            <a href="AjouterGestionnaire.php" class="btn">Ajouter un Gestionnaires de Contenu</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['idGest']); ?></td>
                            <td><?php echo htmlspecialchars($row['nomGest']); ?></td>
                            <td><?php echo htmlspecialchars($row['prenomGest']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                           
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun Gestionnaire de Contenu trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
