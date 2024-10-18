<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twinnetwork";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$Email = $_POST['email'];
$motpasse = $_POST['password'];

// Requête pour vérifier les informations de connexion
$sql = "SELECT * FROM user WHERE Email = ? AND motpasse = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $Email, $motpasse);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Connexion réussie
    $_SESSION['loggedin'] = true;
    header("Location: dashboardGest.php");
} else {
    // Connexion échouée
    header("Location: login.php?error=1");
}

$stmt->close();
$conn->close();
?>
