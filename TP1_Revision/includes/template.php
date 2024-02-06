<?php ?>
<!DOCTYPE html>
<html lang="fr">­­
    <head>
        <title>Mon épicerie en ligne</title>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/x-icon" href="css\img\favicon\favicon-16x16.png">
        <link rel="stylesheet" href="css/stylesheet.css"/> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Mon épicerie en ligne</h1>
                <div class="menu">
                    <a class="white" href="index.php"><i class="fa-sharp fa-solid fa-house"></i>Accueil</a> | <a class="white" href="cart-view.php"><i class="fa-solid fa-cart-shopping"></i>Mon panier</a>
                </div>
            </header>
            <main>
                <?= $content ?>
            </main>
            <footer>
                <p class="your-name">[Nicolas Bouchard]</p>
                <p>Tous droits réservés © cchic.ca</p>
            </footer>
        </div>
    </body>
</html>
