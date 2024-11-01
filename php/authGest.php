<?php
session_start();

// Inclusion du fichier de connexion
include '../dbconnect.php';

$Email = $_POST['email'];
$motpasse = $_POST['password'];

try {
    // Requête pour vérifier les informations de connexion
    $sql = "SELECT * FROM gestionnaire WHERE Email = :Email AND motpasse = :motpasse";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':motpasse', $motpasse);

    // Exécution de la requête
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Connexion réussie
        $_SESSION['loggedin'] = true;
        header("Location: dashboardGest.php");
    } else {
        // Connexion échouée
        header("Location: login.php?error=1");
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
