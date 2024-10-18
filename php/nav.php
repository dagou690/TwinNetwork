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
            padding-top: 60px; /* Ajuster selon la hauteur de la nav bar */
        }

        /* Style pour la nav */
        nav {
            background-color: #2c3e50; /* Bleu nuit */
            padding: 10px 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Ombre pour un effet de profondeur */
            position: fixed; /* Fixe la nav bar */
            top: 0; /* Positionne la nav bar en haut */
            left: 0; /* Aligne la nav bar à gauche */
            width: 100%; /* Prend toute la largeur de l'écran */
            z-index: 1000; /* S'assure que la nav bar reste au-dessus des autres éléments */
        }

        /* Style pour la liste */
        ul {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* Style pour les items */
        li {
            position: relative;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        li:hover {
            background-color: #34495e; /* Changement de couleur au survol */
        }

        /* Premier item à gauche */
        li:first-child {
            margin-right: auto;
            padding: 0; /* Suppression du padding supplémentaire */
        }

        /* Style pour le logo */
        li:first-child img {
            width: 100px; /* Taille ajustée du logo */
            height: auto;
        }

        /* Style pour les liens */
        a {
            text-decoration: none;
            color: #ecf0f1; /* Texte blanc cassé */
            transition: color 0.3s ease;
        }

        /* Effet de survol */
        a:hover {
            color: #1abc9c; /* Couleur vert turquoise */
        }

        /* Couleurs spécifiques pour le premier item */
        li:first-child a {
            color: #f1c40f; /* Couleur jaune pour le premier élément */
        }

        /* Style pour le sous-menu déroulant */
        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #34495e;
            border-radius: 5px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 150px;
            z-index: 1;
        }

        /* Style des éléments dans le sous-menu */
        .dropdown li {
            padding: 12px 20px;
            white-space: nowrap;
        }

        .dropdown li:hover {
            background-color: #1abc9c; /* Couleur vert turquoise au survol */
        }

        .dropdown li a {
            color: white;
        }

        /* Afficher le sous-menu lors du survol */
        .menu-item:hover .dropdown {
            display: block;
        }

        /* MEDIA QUERIES */
        @media (max-width: 768px) {
            ul {
                flex-direction: column;
                padding: 0;
            }

            li {
                padding: 15px 0;
                text-align: center;
            }

            .dropdown {
                position: static;
                min-width: 100%;
            }
        }

        @media (max-width: 480px) {
            ul {
                padding: 0;
            }

            li {
                padding: 12px 0;
            }

            a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php"><img src="image/logotwinnetwork.png" alt="Logo"></a></li>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="galerie.php">Galerie</a></li>
                <?php if (!isset($_SESSION['LOGIN_USER'])) : ?>
                    <li><a href="connexion.php">Connexion</a></li>  
                <?php else : ?>
                    <!-- Menu déroulant pour la publication -->
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
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>
</body>
</html>
