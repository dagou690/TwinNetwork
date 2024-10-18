<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/galerie.css">
        <link rel="stylesheet" href="../css/card.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php require_once("nav.php"); ?>
    <div class="divcontainer">
        <div class="container">
            <div class="slide">       
                <div class="item" style="background-image: url(image/cisse.png);">
                    <div class="content">
                        <div class="name">Esatic</div>
                        <div class="des">Encadrant de parcour de la TWIN</div>
                    </div>
                </div>
                <div class="item" style="background-image: url(image/josuer.jpg);">
                    <div class="content">
                        <div class="name">Promotion IT11</div>
                        <div class="des">L'eau peut pas finir dans poisson</div>
                    </div>
                </div>
                <div class="item" style="background-image: url(image/eze.jpg);">
                    <div class="content">
                        <div class="name">TWIN</div>
                        <div class="des">TWIN c'est famille</div>
                    </div>
                </div>
                <div class="item" style="background-image: url(image/bobet.png);">
                    <div class="content">
                        <div class="name">M Bobet</div>
                        <div class="des">L'enseignant le plus aimer de la TWIN</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="button">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        </div>
        <section class="gallery">
            <div>
                <article>
                <img src="image/bobet.png" alt="motorbike 1">
                </article>

                <article>
                <img src="image/cisse.png" alt="motorbike 2">
                </article>

                <article>
                <img src="image/esatic.jpg" alt="notorbike 3">
                </article>
            
            </div>
            <div>
                <article>
                <img src="image/eze.jpg" alt="mountains 1">
                </article>
                <article>
                <img src="image/IMG_20230929_120729_566.jpg" alt="hand">
                </article>
                <article>
                <img src="image/josuer.jpg" alt="beach">
                </article>
            
            </div>
            <div>
                <article>
                <img src="image/zq.jpg" alt="man on rock">
                </article>
                <article>
                <img src="image/cisse.png" alt="trees">
                </article>
                <article>
                <img src="image/josuer.jpg" alt="sky">
                </article>
            </div>
            
        </section>
    </div>
    
    <script src="../js/galerie.js"></script>
</body>
</html>
