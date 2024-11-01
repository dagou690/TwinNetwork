<?php
// Inclusion du fichier de connexion
include '../dbconnect.php';

// Gestion de l'upload de l'image
$target_dir = "image/";
$photoComplete = basename($_FILES["photoActualite"]["name"]);
$photoActualite = pathinfo($photoComplete, PATHINFO_FILENAME);
$target_file = $target_dir . $photoComplete;

if (move_uploaded_file($_FILES["photoActualite"]["tmp_name"], $target_file)) {
    try {
        // Préparation de la requête SQL avec PDO
        $stmt = $conn->prepare("INSERT INTO Actualite (titreActualite, descripActualite, photoActualite, dateActualite) VALUES (:titreActualite, :descripActualite, :photoActualite, NOW())");
        
        // Liaison des paramètres
        $stmt->bindParam(':titreActualite', $_POST['titreActualite']);
        $stmt->bindParam(':descripActualite', $_POST['descripActualite']);
        $stmt->bindParam(':photoActualite', $photoActualite);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Redirection vers la page principale après ajout
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'actualité : " . $e->getMessage();
    }
} else {
    echo "Erreur lors du téléchargement de la photo.";
}
?>
