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

// Requête pour récupérer les données des étudiants de l'année
$sql = "SELECT photoEtuAnnee, nomEtuAnnee, prenomEtuAnnee, mgaEtuAnnee FROM EtuAnnee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '
        <div class="1">
            <div class="image"><img src="image/' . pathinfo($row["photoEtuAnnee"], PATHINFO_FILENAME) . '.png" alt="Photo de ' . $row["prenomEtuAnnee"] . ' ' . $row["nomEtuAnnee"] . '"></div>
            <div class="nom">
                <p>' . $row["prenomEtuAnnee"] . ' ' . $row["nomEtuAnnee"] . '</p>
            </div>
            <div class="mga">
                <p>MGA : ' . $row["mgaEtuAnnee"] . '</p>
            </div>
        </div>';
    }
} else {
    echo '<p>Aucun étudiant trouvé.</p>';
}

$conn->close();
?>
