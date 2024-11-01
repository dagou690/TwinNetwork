<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Personnalisée</title>
    <style>
        /* Style général */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            padding-top: 60px;
        }

        /* Style pour la nav */
        nav {
            background-color: #2c3e50;
            padding: 10px 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Style pour la liste */
        ul {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            list-style-type: none;
        }

        /* Style pour les items */
        li {
            position: relative;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        li:hover {
            background-color: #3BBEE6;
        }

        #logo-twin:hover {
            background-color: #2c3e50;
        }

        /* Premier item à gauche */
        li:first-child {
            margin-right: auto;
            padding: 0;
        }

        li:first-child img {
            width: 100px;
            height: auto;
        }

        a {
            text-decoration: none;
            color: #ecf0f1;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ffffff;
        }

        /* Couleurs spécifiques pour le premier item */
        li:first-child a {
            color: #f1c40f;
        }

        /* Style pour le sous-menu déroulant */
        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: rgba(44, 62, 80, 0.9);
            border-radius: 5px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 180px;
            z-index: 1;
        }

        /* Afficher le sous-menu au survol */
        .menu-item:hover .dropdown {
            display: block;
            opacity: 1;
        }

        .dropdown li {
            padding: 10px 15px;
            white-space: nowrap;
        }

        .dropdown li:hover {
            background-color: #f1cd15;
        }

        .dropdown li a {
            color: white;
        }

        /* Bouton hamburger caché sur grand écran */
        .menu-toggle {
            display: none;
        }

        /* Media Queries pour les petits écrans */

        @media (max-width: 768px) {
            ul {
                flex-direction: column;
                display: none;
                width: 100%;
                background-color: #2c3e50;
            }

            ul.show {
                display: flex;
            }

            li {
                padding: 15px 0;
                text-align: center;
            }

            .dropdown {
                position: static;
                min-width: 100%;
            }

            /* Style pour le bouton hamburger */
            .menu-toggle {
                display: block;
                cursor: pointer;
                font-size: 24px;
                color: white;
                background: #2c3e50;
                border: none;
                outline: none;
                padding: 10px;
                position: absolute;
                right: 20px;
                top: 15px;
                z-index: 1001;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <!-- Bouton pour petits écrans -->
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <ul id="navbar">
                <li id="logo-twin"><a href="index.php"><img src="image/logotwinnetwork.png" alt="Logo"></a></li>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="galerie.php">Galerie</a></li>
                <?php if (!isset($_SESSION['LOGIN_USER'])) : ?>
                    <li><a href="connexion.php">Connexion</a></li>  
                <?php else : ?>
                    <li class="menu-item">
                        <a href="publications.php">Publication</a>
                        <ul class="dropdown">
                            <li><a href="publier.php">Publier</a></li>
                            <li><a href="publications.php">Voir publication</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="message.php">Discussion</a>
                        <ul class="dropdown">
                            <li><a href="envoyezMessage.php">Privé</a></li>
                            <li><a href="message.php">Public</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="#">Mon compte</a>
                        <ul class="dropdown">
                            <li><a href="#">Mes informations</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </header>

    <script>
        function toggleMenu() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('show');
        }
    </script>
</body>
</html>
