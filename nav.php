<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <style>
        /* Style pour le body */
        * {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Style pour la nav */
        nav {
            background-color: #333; /* Fond noir pour le menu de navigation */
            padding: 10px 0;
        }

        /* Style pour la liste */
        ul {
            display: flex;
            justify-content: space-between; /* Distribue les éléments */
            align-items: center;
            list-style-type: none;
            margin: 0;
            padding: 0 20px; /* Ajoute un peu de padding sur les côtés */
        }

        /* Style pour les items */
        li {
            padding: 10px 20px;
        }

        /* Premier item à gauche */
        li:first-child {
            margin-right: auto; /* Éloigne l'élément suivant à droite */
        }

        /* Style pour les liens */
        a {
            text-decoration: none;
            color: white; /* Couleur de texte par défaut */
        }

        /* Couleurs spécifiques pour chaque item */
        li:first-child a {
            color: yellow; /* Couleur jaune pour le premier élément */
            font-weight: bold;
            font-size: 20px;
        }

        li:nth-child(2) a, li:nth-child(3) a,li:nth-child(4) a {
            color: white; /* Blanc pour le dernier élément */
            font-size: 20px;
        }

                /* Hover effect for the li elements on the right */
        li:nth-child(2):hover a, 
        li:nth-child(3):hover a, 
        li:nth-child(4):hover a {
            color: gray; /* Change la couleur du texte en bleu lors du survol */
        }
        /* MEDIA QUERIES */
        /* Pour tablettes (largeur de 768px ou moins) */
        @media (max-width: 768px) {
            ul {
                flex-direction: column; /* Empile les éléments verticalement */
                padding: 0; /* Retire le padding latéral */
            }

            li {
                padding: 15px 0; /* Espacement vertical plus large */
                text-align: center; /* Centrer les items */
            }

            li:first-child {
                margin-right: 0; /* Supprime l'effet de décalage vers la droite */
            }
        }

        /* Pour mobiles (largeur de 480px ou moins) */
        @media (max-width: 480px) {
            ul {
                flex-direction: column; /* Empile les éléments verticalement */
                padding: 0;
            }

            li {
                padding: 12px 0; /* Espacement vertical plus petit pour mobile */
                text-align: center;
            }

            li:first-child {
                margin-right: 0;
            }

            /* Ajustement des tailles de texte pour les petits écrans */
            a {
                font-size: 14px; /* Taille de texte réduite pour les petits écrans */
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">TwinNetwork</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Galerie</a></li>
                <li><a href="#">Connexion</a></li>  
            </ul>
        </nav>
    </header>
</body>
</html>
