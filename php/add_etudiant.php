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

// Gestion de l'upload de l'image
$target_dir = "image/";
$photoComplete = basename($_FILES["photoEtuAnnee"]["name"]);
$photoEtuAnnee = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

move_uploaded_file($_FILES["photoEtuAnnee"]["tmp_name"], $target_file);

// Préparation de la requête SQL
$stmt = $conn->prepare("INSERT INTO EtuAnnee (nomEtuAnnee, prenomEtuAnnee, mgaEtuAnnee, photoEtuAnnee) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nomEtuAnnee, $prenomEtuAnnee, $mgaEtuAnnee, $photoEtuAnnee);

$nomEtuAnnee = $_POST['nomEtuAnnee'];
$prenomEtuAnnee = $_POST['prenomEtuAnnee'];
$mgaEtuAnnee = $_POST['mgaEtuAnnee'];

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: index.php"); // Redirection vers la page principale
?>
