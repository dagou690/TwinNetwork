<?php
session_start();
include '../../dbconnect.php'; // Inclusion du fichier de connexion
require_once("../fonction.php");

if(!isset($_SESSION['LOGIN_ADMIN'])){
    redirectToUrl('loginAdmin.php');
}


if (isset($_POST['ajouterGestionnaire'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $motPasse = sha1($_POST['motPasse'], PASSWORD_DEFAULT); // Hachage du mot de passe
    $confmotPasse = sha1($_POST['confmotPasse'], PASSWORD_DEFAULT); // Hachage du mot de passe
   

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
        $verifierEmail = $conn->prepare("SELECT * FROM gestionnaire WHERE Email = ?");
        $verifierEmail->execute([$email]);
        $controlEmail = $verifierEmail->rowCount();
        
        if ($controlEmail == 0) {
            $sql = "INSERT INTO gestionnaire (nomGest, prenomGest, Email, motpasse) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nom, $prenom, $email, $motPasse]);
        
            if ($stmt->execute()) {
                $gestionnAjoute = "<div class='alert alert-success'>Etudiant ajouté avec succès.</div>";
                redirectToUrl('listeGestionnaire.php');
            } 
            else{
                $erreurAjout = "Erreur lors de l'ajout de l'étudiant.";
            }
        } else {
            $emailExiste = 'Désolé mais cette adresse a déjà un compte.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Gestionnaire de Contenu</title>
    <style>
                /* Style général pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #333;
            margin: 20px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Conteneur principal */
        .container {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background-color: #2c3e50;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Titre de la page */
        h2 {
            font-size: 24px;
            color: #3BBEE6;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Champs de formulaire */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: white;
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

        /* Bouton d'ajout d'utilisateur */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #ffffff;
            background-color: #3BBEE6;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #3BBEE6;
            opacity: 90%;
        }

        /* Alertes de réussite et d'erreur */
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
        <h2 class="text-center">Ajouter un Gestionnaire de Contenu</h2><br>
        <?php if(!empty($gestionnAjoute)){
            echo $gestionnAjoute;
        }
        if(!empty($errEmail)){
            echo $errEmail;
        }
        if(!empty($motPasseIncorrete)){
        ?>
            <div style="color: red;">
                <?php echo $motPasseIncorrete; ?>
            </div>
        <?php
        }
        if(!empty($emailExiste)){ 
            ?>
            <div class='alert alert-danger'>
                <?php echo $emailExiste ?>
            </div>
           <?php } ?>
        <?php
        if(!empty($erreurAjout)){ 
            ?>
            <div class='alert alert-danger'>
                <?php echo $erreurAjout ?>
            </div>
           <?php } ?>
        
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
                <label for="motPasse">Mot de Passe</label>
                <input type="password" name="motPasse" id="motPasse" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confmotPasse">Confirmez</label>
                <input type="password" name="confmotPasse" id="confmotPasse" class="form-control" required>
            </div>
            <button type="submit" name="ajouterGestionnaire" class="btn btn-custom">Ajouter Gestionnaire de Contenu</button>
        </form>
    </div>
</body>
</html>
