<?php
// Inclusion du fichier de connexion
include 'dbconnect.php';

// Gestion de l'upload de l'image
$target_dir = "image/";
$photoComplete = basename($_FILES["photoEtuAnnee"]["name"]);
$photoEtuAnnee = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

if (move_uploaded_file($_FILES["photoEtuAnnee"]["tmp_name"], $target_file)) {
    try {
        // Préparation de la requête SQL avec PDO
        $stmt = $conn->prepare("INSERT INTO EtuAnnee (nomEtuAnnee, prenomEtuAnnee, mgaEtuAnnee, photoEtuAnnee) VALUES (:nomEtuAnnee, :prenomEtuAnnee, :mgaEtuAnnee, :photoEtuAnnee)");

        // Liaison des paramètres
        $stmt->bindParam(':nomEtuAnnee', $_POST['nomEtuAnnee']);
        $stmt->bindParam(':prenomEtuAnnee', $_POST['prenomEtuAnnee']);
        $stmt->bindParam(':mgaEtuAnnee', $_POST['mgaEtuAnnee'], PDO::PARAM_INT);
        $stmt->bindParam(':photoEtuAnnee', $photoEtuAnnee);

        // Exécution de la requête
        $stmt->execute();

        // Redirection vers la page principale après ajout
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'étudiant de l'année : " . $e->getMessage();
    }
} else {
    echo "Erreur lors du téléchargement de la photo.";
}
?>
