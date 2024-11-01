<?php
session_start();
include '../../dbconnect.php'; // Inclusion du fichier de connexion
require_once("../fonction.php");

if(!isset($_SESSION['LOGIN_ADMIN'])){
    redirectToUrl('loginAdmin.php');
}

if (isset($_POST['ajouterUtilisateur'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $motPasse = sha1($_POST['motPasse']); // Hachage du mot de passe
    $confmotPasse = sha1($_POST['confmotPasse']); // Hachage du mot de passe
    $numTel = htmlspecialchars($_POST['numTel']);
    $ville = htmlspecialchars($_POST['ville']);
    $promotion = htmlspecialchars($_POST['promotion']);

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Il faut un email valide pour s\'inscrire.';
    } 
    // Vérification si les deux mots de passe correspondent
    elseif ($motPasse != $confmotPasse) {
        $motPasseIncorrete = 'Le mot de passe doit être identique.';
    } 
    else {
        // Vérifier si l'email existe déjà
        $verifierEmail = $conn->prepare("SELECT * FROM user WHERE Email = ?");
        $verifierEmail->execute([$email]);
        $controlEmail = $verifierEmail->rowCount();
        
        if ($controlEmail == 0) {
            $sql = "INSERT INTO user (Nom, Prenom, Email, motpasse, telUser, villeUser, promotionUser) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nom, $prenom, $email, $motPasse, $numTel, $ville, $promotion]);
        
            if ($stmt) {
                $etudiantAjoute = "<div class='alert alert-success'>Etudiant ajouté avec succès.</div>";
                redirectToUrl('listeEtudiant.php');
            } else {
                $erreurAjout = "Erreur lors de l'ajout de l'étudiant.";
            }
        } else {
            $emailExiste = 'Désolé mais cette adresse email a déjà un compte.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Etudiant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #333;
            margin: 20px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #fca311;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            color: #124559;
            text-align: left;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }
        input:focus,
        select:focus {
            border-color: #124559;
            outline: none;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #ffffff;
            background-color: #fca311;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #fca311;
            opacity: 90%;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .alert-success {
            color: #ffffff;
            background-color: #124559;
        }
        .alert-danger {
            color: #ffffff;
            background-color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Ajouter un Etudiant</h2><br>
        <?php if(!empty($etudiantAjoute)) echo $etudiantAjoute; ?>
        <?php if(!empty($errEmail)) echo "<div class='alert alert-danger'>$errEmail</div>"; ?>
        <?php if(!empty($motPasseIncorrete)) echo "<div class='alert alert-danger'>$motPasseIncorrete</div>"; ?>
        <?php if(!empty($emailExiste)) echo "<div class='alert alert-danger'>$emailExiste</div>"; ?>
        <?php if(!empty($erreurAjout)) echo "<div class='alert alert-danger'>$erreurAjout</div>"; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="numTel">Numéro de Téléphone</label>
                <input type="text" name="numTel" id="numTel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="promotion">Promotion</label>
                <input type="text" name="promotion" id="promotion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="motPasse">Mot de Passe</label>
                <input type="password" name="motPasse" id="motPasse" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confmotPasse">Confirmez</label>
                <input type="password" name="confmotPasse" id="confmotPasse" class="form-control" required>
            </div>
            <button type="submit" name="ajouterUtilisateur" class="btn btn-custom">Ajouter Etudiant</button>
        </form>
    </div>
</body>
</html>
