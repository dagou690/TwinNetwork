<?php
session_start();
require_once("../dbconnect.php");  // connection bd

// Requête pour récupérer les publications avec les informations de l'utilisateur
$recupPublications = $conn->query("
    SELECT * 
    FROM publications 
    JOIN user ON publications.userId = user.idUser 
    ORDER BY date_pub DESC
");

// Traitement de l'ajout de commentaire
if (isset($_POST['comment']) && isset($_POST['publication_id'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $publicationId = $_POST['publication_id'];
    $userId = $_SESSION['LOGIN_USER']['user_id'];

    // Insertion du commentaire dans la base de données
    $stmt = $conn->prepare('INSERT INTO comments (publicationId, userId, comment, date_comment) VALUES (?, ?, ?, NOW())');
    $stmt->execute([$publicationId, $userId, $comment]);

    header('Location: publications.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

<!-- Font-Awesome 5 - Brands and Solid -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css" integrity="sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css" integrity="sha512-SazV6tF6Ko4GxhyIZpKoXiKYndqzh7+cqxl9HDH7DGSpjkCN3QLqTAlhJHJnKxu3/2rfCsltzwFC4CmxZE1hPg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/fotter.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
    
    <style>
        body {
    font-family: 'Roboto', sans-serif; /* Police plus moderne */
    background-color: #f7f9fc;
    margin: 0;
    color: #333;
}

.bodyg {
    padding: 20px;
    max-width: 1200px; /* Limite la largeur de la page pour un design plus centré */
    margin: 0 auto;
}

#publications-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.publication {
    width: 100%;
    max-width: 800px; /* Fixe une largeur maximale pour éviter les trop grandes publications */
    background-color: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Réduit l'effet d'ombre pour plus de légèreté */
    margin-bottom: 30px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.publication:hover {
    transform: translateY(-5px); /* Ajoute un léger effet de déplacement au survol */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Ombre plus marquée lors du survol */
}

.publication p {
    color: #4a4a4a;
    font-size: 1.1em;
    line-height: 1.6;
}

.publication img {
    max-width: 100%;
    height: auto;
    margin-top: 15px;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.publication img:hover {
    transform: scale(1.05); /* Zoom léger sur l'image au survol */
}

.publication small {
    display: block;
    color: #999;
    margin-top: 15px;
}

.author {
    font-size: 1em;
    color: #555;
    margin-bottom: 8px;
    font-weight: bold;
}

.comments {
    margin-top: 20px;
    text-align: left;
    border-top: 1px solid #ddd;
    padding-top: 15px;
}

.comment {
    margin-bottom: 10px;
    font-size: 0.95em;
    color: #333;
}

.comment-author {
    font-weight: bold;
}

.comment-form {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.comment-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1em;
    transition: border 0.3s ease;
}

.comment-form textarea:focus {
    border-color: #00796b; /* Couleur plus prononcée pour l'effet focus */
    outline: none;
}

.comment-form button {
    padding: 10px 20px;
    background-color: #3BBEE6;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

.comment-form button:hover {
    background-color: #2c3e50;
}

    </style>

</head>
<body>
    <?php require_once("nav.php"); ?>
    <div class="bodyg">
        <div id="publications-container">
            <h1 style="color: #2c3e50;">Publications</h1><br><br>
            <?php
            while ($publication = $recupPublications->fetch()) {
                echo '<div class="publication">';
                
                // Affichage de l'auteur
                echo '<div class="author">Publié par : ' . htmlspecialchars($publication['Nom']) . '</div>';
                // Affichage de la date
                echo '<small>' . date('d/m/Y H:i', strtotime($publication['date_pub'])) . '</small>';
                
                // Affichage du contenu de la publication
                echo '<p>' . htmlspecialchars($publication['content']) . '</p>';
                
                // Affichage de l'image si elle existe
                if ($publication['image']) {
                    echo '<img style="width: 700px;"src="' . htmlspecialchars($publication['image']) . '" alt="Image de la publication">';
                }
                
                // Section de commentaire
                echo '<div class="comments">';
                
                // Requête pour récupérer les commentaires
                $recupComments = $conn->prepare("SELECT * FROM comments JOIN user ON comments.userId = user.idUser WHERE publicationId = ?");
                $recupComments->execute([$publication['id']]);

                while ($comment = $recupComments->fetch()) {
                    echo '<div class="comment">';
                    echo '<span class="comment-author">' . htmlspecialchars($comment['Nom']) . ' :</span> ';
                    echo htmlspecialchars($comment['comment']);
                    echo '</div>';
                }

                // Formulaire d'ajout de commentaire
                echo '<form class="comment-form" method="POST">';
                echo '<textarea name="comment" rows="2" placeholder="Écrire un commentaire..." required></textarea>';
                echo '<input type="hidden" name="publication_id" value="' . $publication['id'] . '">';
                echo '<button type="submit">Commenter</button>';
                echo '</form>';

                echo '</div>'; // Fin de la section des commentaires
                
                echo '</div>'; // Fin de la publication
            }
            ?>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>
</html>
