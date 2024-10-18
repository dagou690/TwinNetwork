<?php
    session_start();
    require_once("fonction.php");
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
                <div><p>TWIN</p></div>
                <div><p>ESATIC</p></div>
            </div>
            <div class="descriptiontitreTWIN">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, laudantium. Doloribus ad rerum totam aspernatur cupiditate necessitatibus voluptas quis? Consequuntur. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia quisquam fugit temporibus, asperiores sit quam ullam necessitatibus, blanditiis sint delectus accusamus sed voluptatum illo reiciendis enim deserunt nostrum eum. Soluta deserunt ad, est praesentium corporis, nesciunt provident minima harum eveniet ullam dolores exercitationem officia! Nam doloremque temporibus sed ullam recusandae.</p>
            </div>
            <div class="descriptiontitreESATIC">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas fugit itaque nisi cumque vel iste beatae labore enim, explicabo eos!Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, laudantium. Doloribus ad rerum totam aspernatur cupiditate necessitatibus voluptas quis? Consequuntur. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda earum illum, dolorum maxime inventore sunt nemo officiis delectus repudiandae odio quis quia quo aliquid corporis ratione dolor fuga! Nemo et aspernatur deserunt voluptate cupiditate delectus, animi fugit ratione atque soluta perspiciatis? Voluptate at error repellendus dicta tempora debitis ex id?</p>
            </div>
        </section>
        <section>
            <div class="gauche-pres">
                <div class="titre"><p>Responsable de notre filière</p></div>
                <div class="nom"><p>M. CISSE Cédric</p></div>
                <div class="descrip"><p>Enseignant Chercheur à ESATIC</p></div>
                <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem atque est eligendi nobis blanditiis at sequi unde sint saepe quo veritatis accusantium expedita, dignissimos mollitia. Tenetur nihil numquam et rerum repudiandae sequi quisquam officiis quam, amet saepe exercitationem iure. Dicta fuga, quidem sit atque obcaecati tempore autem quod magni maxime asperiores voluptatibus animi itaque vel ipsam neque recusandae numquam nobis libero veritatis, iste magnam sint! Quas expedita nulla, consectetur molestiae commodi voluptatem aliquid accusamus sapiente. Id maxime dicta aperiam voluptates esse necessitatibus est rem? Corporis doloremque, eaque eveniet fuga vitae corrupti, sunt tenetur nisi tempore natus quas et aliquid tempora.</p></div>
            </div>
            <div class="droite-pres"><img src="../image/frame-cisse.png" alt="M. CISSE Cédric"></div>
        </section>
        <section>
            <div class="design">
                <div class="barre"></div>
                <div class="texte-barre"><p>Etudiant de l'année</p></div>
            </div>
            <div class="y-stu">
                <div class="1">
                    <div class="image"><img src="../image/student-fort-02 twin 3-02.png" alt=""></div>
                    <div class="nom"><p>Nom</p></div>
                    <div class="mga"><p>MGA : 15</p></div>
                </div>
                <div class="2">
                    <div class="image"><img src="../image/student-fort-02 twin2-02.png" alt=""></div>
                    <div class="nom"><p>Nom</p></div>
                    <div class="mga"><p>MGA : 15</p></div>
                </div>
                <div class="3">
                    <div class="image"><img src="../image/student-fort-02 twin 1-02.png" alt=""></div>
                    <div class="nom"><p>Nom</p></div>
                    <div class="mga"><p>MGA : 15</p></div>
                </div>
            </div>
        </section>
        <section>
            <div class="alum">
                <div class="titre-alum"><p>Quelques alumni remarquables</p></div>
                <div class="design-alum"></div>
            </div>
            <div class="etu-alum">
                <div class="1">
                    <div class="image"><img src="../image/alumni-picture-02.png" alt=""></div>
                    <div class="pres-alumni">
                        <div class="nom"><p>YAO Gilles Robert Gaspard</p></div>
                        <div class="metier"><p>Ingénieur en BIG DATA & IA</p></div>
                        <div class="exper"><p>+15 année d'expérience</p></div>
                    </div>
                </div>
                <div class="1">
                    <div class="image"><img src="../image/alumni-picture-02.png" alt=""></div>
                    <div class="pres-alumni">
                        <div class="nom"><p>YAO Gilles Robert Gaspard</p></div>
                        <div class="metier"><p>Ingénieur en BIG DATA & IA</p></div>
                        <div class="exper"><p>+15 année d'expérience</p></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>