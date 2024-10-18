<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Actualité</title>
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

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

form {
    width: 100%;
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une Actualité</h1>
        <form action="add_actualite.php" method="post" enctype="multipart/form-data">
            <label for="titreActualite">Titre:</label>
            <input type="text" id="titreActualite" name="titreActualite" required>
            
            <label for="descripActualite">Description:</label>
            <textarea id="descripActualite" name="descripActualite" required></textarea>
            
            <label for="photoActualite">Photo:</label>
            <input type="file" id="photoActualite" name="photoActualite" required>
            
            <button type="submit">Ajouter Actualité</button>
        </form>
    </div>
</body>
</html>
