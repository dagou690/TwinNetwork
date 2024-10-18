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
$photoComplete = basename($_FILES["photoActualite"]["name"]);
$photoActualite = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

move_uploaded_file($_FILES["photoActualite"]["tmp_name"], $target_file);

// Préparation de la requête SQL
$stmt = $conn->prepare("INSERT INTO Actualite (titreActualite, descripActualite, photoActualite, dateActualite) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $titreActualite, $descripActualite, $photoActualite);

$titreActualite = $_POST['titreActualite'];
$descripActualite = $_POST['descripActualite'];

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: index.php"); // Redirection vers la page principale
?>
