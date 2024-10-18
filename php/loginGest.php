<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Contenu Statique</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Style amélioré pour le formulaire de connexion */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #2c3e50;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #ecf0f1;
    }

    .gdiv {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #34495e;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
    }

    h1 {
        color: #ecf0f1;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    .logo {
        width: 80px;
        height: auto;
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    label {
        display: block;
        font-size: 14px;
        color: #333;
        margin-bottom: 8px;
        font-weight: 600;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #bdc3c7;
        margin-bottom: 15px;
        font-size: 16px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #27ae60;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-weight: 600;
    }

    button:hover {
        background-color: #2ecc71;
    }

    form a {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #2980b9;
        text-decoration: none;
        font-size: 14px;
    }

    form a:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .gdiv {
            padding: 20px;
        }

        form {
            padding: 20px;
        }

        h1 {
            font-size: 20px;
        }
    }
</style>
<body>
    <div class="gdiv">
        <img class="logo" src="../image/logo.png" alt="logo">
        <h1>GESTION CONTENU STATIQUE</h1>
        <form action="authGest.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
