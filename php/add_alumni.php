<?php
// Inclusion du fichier de connexion
include 'dbconnect.php';

// Gestion de l'upload de l'image
$target_dir = "image/";
$photoComplete = basename($_FILES["photoAlumni"]["name"]);
$photoAlumni = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

if (move_uploaded_file($_FILES["photoAlumni"]["tmp_name"], $target_file)) {
    try {
        // Préparation de la requête SQL avec PDO
        $stmt = $conn->prepare("INSERT INTO alumni (nomAlumni, prenomAlumni, metier, nbAnneeExpAlumni, photoAlumni) VALUES (:nomAlumni, :prenomAlumni, :metier, :nbAnneeExpAlumni, :photoAlumni)");

        // Liaison des paramètres
        $stmt->bindParam(':nomAlumni', $_POST['nomAlumni']);
        $stmt->bindParam(':prenomAlumni', $_POST['prenomAlumni']);
        $stmt->bindParam(':metier', $_POST['metier']);
        $stmt->bindParam(':nbAnneeExpAlumni', $_POST['nbAnneeExpAlumni']);
        $stmt->bindParam(':photoAlumni', $photoAlumni);

        // Exécution de la requête
        $stmt->execute();

        // Redirection vers la page principale après ajout
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'alumni : " . $e->getMessage();
    }
} else {
    echo "Erreur lors du téléchargement de la photo.";
}
?>
