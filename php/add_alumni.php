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
$photoComplete = basename($_FILES["photoAlumni"]["name"]);
$photoAlumni = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

move_uploaded_file($_FILES["photoAlumni"]["tmp_name"], $target_file);

// Préparation de la requête SQL
$stmt = $conn->prepare("INSERT INTO alumni (nomAlumni, prenomAlumni, metier, nbAnneeExpAlumni, photoAlumni) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssds", $nomAlumni, $prenomAlumni, $metier, $nbAnneeExpAlumni, $photoAlumni);

$nomAlumni = $_POST['nomAlumni'];
$prenomAlumni = $_POST['prenomAlumni'];
$metier = $_POST['metier'];
$nbAnneeExpAlumni = $_POST['nbAnneeExpAlumni'];

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: index.php"); // Redirection vers la page principale
?>
