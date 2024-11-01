<?php
// Inclusion du fichier de connexion
include '../../dbconnect.php';

try {
    // Requête pour récupérer les données des étudiants de l'année
    $sql = "SELECT photoEtuAnnee, nomEtuAnnee, prenomEtuAnnee, mgaEtuAnnee FROM EtuAnnee";
    $stmt = $conn->query($sql);

    // Vérification de la présence de données
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '
            <div class="1">
                <div class="image">
                    <img src="image/' . htmlspecialchars(pathinfo($row["photoEtuAnnee"], PATHINFO_FILENAME)) . '.png" alt="Photo de ' . htmlspecialchars($row["prenomEtuAnnee"]) . ' ' . htmlspecialchars($row["nomEtuAnnee"]) . '">
                </div>
                <div class="nom">
                    <p>' . htmlspecialchars($row["prenomEtuAnnee"]) . ' ' . htmlspecialchars($row["nomEtuAnnee"]) . '</p>
                </div>
                <div class="mga">
                    <p>MGA : ' . htmlspecialchars($row["mgaEtuAnnee"]) . '</p>
                </div>
            </div>';
        }
    } else {
        echo '<p>Aucun étudiant trouvé.</p>';
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
