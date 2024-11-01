<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.dashboard-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

li {
    margin: 10px 0;
    width: 100%;
}

li a {
    display: block;
    padding: 10px;
    /* background-color: #4CAF50; */
    color: white;
    text-decoration: none;
    text-align: center;
    border-radius: 4px;
    transition: background-color 0.3s;
    font-size: bold;
}

/* li a:hover {
    font-size: bold;
} */

form {
    margin-top: 20px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #e53935;
}

</style>
<body>
    <div class="dashboard-container">
        <h1>Tableau de Bord</h1>
        <ul>
            <li style="background-color :#e53935";><a href="etuanneehtml.php">Ajouter un étudiant de l'année</a></li>
            <li style="background-color :#3BBEE6";><a href="alumnihtml.php">Ajouter un alumni</a></li>
            <li style="background-color :#007bff";><a href="actualitehtml.php">Ajouter une actualité</a></li>
        </ul>
        <form action="logoutGest.php" method="post">
            <button type="submit">Se déconnecter</button>
        </form>
    </div>
</body>
</html>
