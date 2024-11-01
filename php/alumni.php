<?php
// Inclusion du fichier de connexion
include '../dbconnect.php';

try {
    // Requête pour récupérer les données des alumni
    $sql = "SELECT photoAlumni, nomAlumni, prenomAlumni, metier, nbAnneeExpAlumni FROM alumni";
    $stmt = $conn->query($sql);

    // Vérification de la présence de données
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Récupérer le nom du fichier sans extension
            $photoActualite = pathinfo($row["photoAlumni"], PATHINFO_FILENAME);

            echo '
            <div class="1">
                <div class="image">
                    <img src="image/' . $photoActualite . '.png" alt="Photo de ' . htmlspecialchars($row["prenomAlumni"]) . ' ' . htmlspecialchars($row["nomAlumni"]) . '">
                </div>
                <div class="pres-alumni">
                    <div class="nom">
                        <p>' . htmlspecialchars($row["prenomAlumni"]) . ' ' . htmlspecialchars($row["nomAlumni"]) . '</p>
                    </div>
                    <div class="metier">
                        <p>' . htmlspecialchars($row["metier"]) . '</p>
                    </div>
                    <div class="exper">
                        <p>+' . htmlspecialchars($row["nbAnneeExpAlumni"]) . ' années d\'expérience</p>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<p>Aucun alumni trouvé.</p>';
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
