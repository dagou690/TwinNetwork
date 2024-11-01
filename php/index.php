<?php
session_start();
include '../dbconnect.php'; // Inclusion du fichier de connexion
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <p><span style="color:#007bff; font-weight:bold";>TECHNOLOGIES DU WEB ET IMAGES NUMERIQUES (TWIN)</span><br><hr><br>
                    <span style="color:#007bff; font-weight:bold";>CARACTERISTIQUES DE LA FORMATION</span><br>
                    Formation diplômante accessible en formation initiale<br>
                    <span style="font-weight:bold">Durée de la formation</span> : 3 ans (6 semestres)<br>
                    <span style="font-weight:bold";>Grade</span> : Licence (BAC +3)<br><br><hr><br>
                    La <span style="font-weight:bold">Licence TWIN</span> vise à former des Techniciens supérieurs dans le domaine des technologies du web et de la
                    communication digitale. Elle répond aux besoins suscités par les nouveaux outils de communication qui, intégrant les
                    technologies numériques, transforment les savoirs faire des métiers de l’image et de la communication digitale</p>
            </div>
            <div class="descriptiontitreESATIC">
                <p><span style="font-weight:bold">L'École Supérieure Africaine des Technologies de l'Information et de la Communication (ESATIC)</span> est un établissement d'enseignement supérieur situé à Abidjan, en Côte d'Ivoire. Fondée en 1967, l'ESATIC propose des formations spécialisées dans les domaines des technologies de l'information et de la communication. Les étudiants ont la possibilité de suivre des cursus axés sur les réseaux informatiques, la programmation, la sécurité informatique, le développement web, la gestion de projets, et bien d'autres. Grâce à son expertise reconnue, l'ESATIC offre aux étudiants une formation de qualité, leur permettant d'acquérir les compétences nécessaires pour réussir dans le secteur des TIC en Côte d'Ivoire et à l'international.

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
                    <p  style="font-weight:bold">Enseignant Chercheur à ESATIC</p>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem atque est eligendi nobis blanditiis at sequi unde sint saepe quo veritatis accusantium expedita, dignissimos mollitia. Tenetur nihil numquam et rerum repudiandae sequi quisquam officiis quam, amet saepe exercitationem iure. Dicta fuga, quidem sit atque obcaecati tempore autem quod magni maxime asperiores voluptatibus animi itaque vel ipsam neque recusandae numquam nobis libero veritatis, iste magnam sint! Quas expedita nulla, consectetur molestiae commodi voluptatem aliquid accusamus sapiente. Id maxime dicta aperiam voluptates esse nécessité est rem? Corporis doloremque, eaque eveniet fuga vitae corrupti, sunt tenetur nisi tempore natus quas et aliquid tempora.</p>
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
                // Requête pour récupérer les actualités
                $sql = "SELECT * FROM Actualite";
                $stmt = $conn->query($sql);

                if ($stmt->rowCount() > 0) {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<article class="news-item">';
                        echo '<div class="news-image"><img src="image/' . htmlspecialchars($row["photoActualite"]) . '.png" alt="Actualité ' . htmlspecialchars($row["idActualite"]) . '"></div>';
                        echo '<div class="news-content">';
                        echo '<h3>' . htmlspecialchars($row["titreActualite"]) . '</h3>';
                        echo '<p class="news-description">' . htmlspecialchars($row["descripActualite"]) . '</p>';
                        echo '<p class="news-date">Publié le ' . htmlspecialchars($row["dateActualite"]) . '</p>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo "Aucune actualité trouvée.";
                }
                ?>
            </div>
        </section>

    </main>
    <?php
    include('footer.php');
    ?>
</body>

</html>
