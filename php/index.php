<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php require_once("nav.php"); ?>
    <main>
        <section>
            <div class="titrefiliere">
                <div>
                    <p>TWIN</p>
                </div>
                <div>
                    <p>ESATIC</p>
                </div>
            </div>
            <div class="descriptiontitreTWIN">
                <p>TECHNOLOGIES DU WEB ET IMAGES NUMERIQUES (TWIN)<br><hr><br>
                    CARACTERISTIQUES DE LA FORMATION<br>
                    Formation diplômante accessible en formation initiale<br>
                    Durée de la formation : 3 ans (6 semestres)<br>
                    Grade : Licence (BAC +3)<br><br><hr><br>
                    La Licence TWIN vise à former des Techniciens supérieurs dans le domaine des technologies du web et de la
communication digitale. Elle répond aux besoins suscités par les nouveaux outils de communication qui, intégrant les
technologies numériques, transforment les savoirs faire des métiers de l’image et de la communication digitale</p>
            </div>
            <div class="descriptiontitreESATIC">
                <p>L'École Supérieure Africaine des Technologies de l'Information et de la Communication (ESATIC) est un établissement d'enseignement supérieur situé à Abidjan, en Côte d'Ivoire. Fondée en 1967, l'ESATIC propose des formations spécialisées dans les domaines des technologies de l'information et de la communication. Les étudiants ont la possibilité de suivre des cursus axés sur les réseaux informatiques, la programmation, la sécurité informatique, le développement web, la gestion de projets, et bien d'autres. Grâce à son expertise reconnue, l'ESATIC offre aux étudiants une formation de qualité, leur permettant d'acquérir les compétences nécessaires pour réussir dans le secteur des TIC en Côte d'Ivoire et à l'international.

L'ESATIC se distingue par son approche pratique et orientée vers le monde professionnel. Les étudiants bénéficient de nombreux stages en entreprise, leur permettant de mettre en pratique leurs connaissances et de développer leur expérience professionnelle. De plus, l'établissement entretient des partenariats solides avec des entreprises du secteur des TIC, offrant ainsi aux étudiants des opportunités de stage et d'emploi. Grâce à son réseau d'anciens élèves, l'ESATIC facilite également l'insertion professionnelle de ses diplômés, qui sont très recherchés sur le marché du travail.</p>
            </div>
        </section>
        <section>
            <div class="gauche-pres">
                <div class="titre">
                    <p>Responsable de notre filière</p>
                </div>
                <div class="nom">
                    <p>M. CISSE Cédric</p>
                </div>
                <div class="descrip">
                    <p>Enseignant Chercheur à ESATIC</p>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem atque est eligendi nobis blanditiis at sequi unde sint saepe quo veritatis accusantium expedita, dignissimos mollitia. Tenetur nihil numquam et rerum repudiandae sequi quisquam officiis quam, amet saepe exercitationem iure. Dicta fuga, quidem sit atque obcaecati tempore autem quod magni maxime asperiores voluptatibus animi itaque vel ipsam neque recusandae numquam nobis libero veritatis, iste magnam sint! Quas expedita nulla, consectetur molestiae commodi voluptatem aliquid accusamus sapiente. Id maxime dicta aperiam voluptates esse necessitatibus est rem? Corporis doloremque, eaque eveniet fuga vitae corrupti, sunt tenetur nisi tempore natus quas et aliquid tempora.</p>
                </div>
            </div>
            <div class="droite-pres"><img src="image/frame-cisse.png" alt="M. CISSE Cédric"></div>
        </section>
        <section>
    <div class="design">
        <div class="barre"></div>
        <div class="texte-barre">
            <p>Étudiant de l'année</p>
        </div>
    </div>
    <div class="y-stu">
        <?php include 'etudiants.php'; ?>
    </div>
</section>

        <section>
        <div class="alum">
            <div class="titre-alum">
                <p>Quelques alumni remarquables</p>
            </div>
            <div class="design-alum"></div>
        </div>
        <div class="etu-alum">
            <!-- Les cartes des alumni seront insérées ici par PHP -->
            <?php include 'alumni.php'; ?>
        </div>
    </section>


        <section class="actualite">
            <div class="design">
                <div class="barre"></div>
                <div class="texte-barre">
                    <p>Actualité</p>
                </div>
            </div>
            <div class="news-container">
                <?php
                // Connexion à la base de données
                $conn = new mysqli("localhost", "root", "", "twinnetwork");
    
                if ($conn->connect_error) {
                    die("Connexion échouée: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM Actualite";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article class="news-item">';
                        echo '<div class="news-image"><img src="image/' . $row["photoActualite"] . '.png" alt="Actualité ' . $row["idActualite"] . '"></div>';
                        echo '<div class="news-content">';
                        echo '<h3>' . $row["titreActualite"] . '</h3>';
                        echo '<p class="news-description">' . $row["descripActualite"] . '</p>';
                        echo '<p class="news-date">Publié le ' . $row["dateActualite"] . '</p>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo "Aucune actualité trouvée.";
                }

                $conn->close();
                ?>
            </div>
        </section>

    </main>
</body>

</html>