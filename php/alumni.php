<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twinnetwork";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Requête pour récupérer les données des alumni
$sql = "SELECT photoAlumni, nomAlumni, prenomAlumni, metier, nbAnneeExpAlumni FROM alumni";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Récupérer le nom du fichier sans extension
        $photoActualite = pathinfo($row["photoAlumni"], PATHINFO_FILENAME);
        
        echo '
        <div class="1">
            <div class="image">
                <img src="image/' . $photoActualite . '.png" alt="Photo de ' . $row["prenomAlumni"] . ' ' . $row["nomAlumni"] . '">
            </div>
            <div class="pres-alumni">
                <div class="nom">
                    <p>' . $row["prenomAlumni"] . ' ' . $row["nomAlumni"] . '</p>
                </div>
                <div class="metier">
                    <p>' . $row["metier"] . '</p>
                </div>
                <div class="exper">
                    <p>+' . $row["nbAnneeExpAlumni"] . ' années d\'expérience</p>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p>Aucun alumni trouvé.</p>';
}

$conn->close();
?>
