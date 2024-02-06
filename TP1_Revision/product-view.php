<?php
$page_title = "Mon épicerie en ligne";

require_once(realpath(__DIR__ . '/dal/DAL.php'));

$product = null;
$image = null;
$quantite = null;
$prix = null;
$unite = null;

ob_start();

if(isset($_GET['produitId'])) {
    $id = trim($_GET['produitId']);

    if ($id != "") {
        $dal = new DAL();
        $product = $dal->ProductFact()->getProduct($id);
        
        foreach ($product as $prod){
            $image= $prod->getImage();
            $quantite= $prod->getQuantite();
            $prix= $prod->getPrix();
            $unite= $prod->getUnite();
            $nom= $prod->getName();
        }
        $lienImage = "css/img/".$image;
    }
}

?>

<h1><?= $nom ?></h1>

<div class="Container">
    <div class="productPreview-image"><img src=<?= $lienImage ?>></div>

    <div class="product-info">
        <h2>Détails du produit</h2>
        <p><?= $quantite; ?> <?= $unite; ?></p>
        <p><?= $prix ?> $</p>

        <form action="cart-process.php?action=add" method="post">
            <div>
                <p>Quantité : <input type="number" name="quantite" min="1" max="10"> </p>
            </div>
            <div>
                <input type="hidden" name="produitId" value="<?= $id ?>">
                <input class="standard-button" type="submit" value="Ajouter au panier">
            </div>
        </form>
    </div>
</div>


<?php

$content = ob_get_clean();

require('includes/template.php');
?>