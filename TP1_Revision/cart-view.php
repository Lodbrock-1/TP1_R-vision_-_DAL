<?php
require_once(realpath(__DIR__ . '/dal/DAL.php'));

ob_start();
?>
<div>
    <h2>Votre panier d'achat</h2>
    <div>
        <?php 
            $dal = new DAL();
            $products = $dal->CartProductFact()->getAllCartProducts();
            $prixPanier = 0;
        
            if(count($products) == 0) {
                ?>
                <p>Aucun produit dans le panier.</p>
                <?php
            }
            else
            {
                foreach($products as $product) {

                    if($product->token == $_COOKIE['token']) {

                        $produitComplet = $dal->ProductFact()->getProduct($product->Id);

                        $nomItem = $produitComplet->getName();
                        $lienImage = "img/" . strtolower($nomItem) . ".jpg";

                        $quantiteTotale = $produitComplet->getQuantite() * $product->getQuantite();
                        
                        $prixTotal = $produitComplet->getPrix() * $product->getPrix();
                        $prixTotal = number_format($prixTotal, 2);

                        $prixPanier += $prixTotal;

                        $idPourSupprimer = $product->getId();
                        ?>
                        <div>
                            <img src="<?= $lienImage ?>">
                            <p><?= $product->quantite ?> x <?= $nomItem ?> </p>
                            <p><?= $quantiteTotale ?> <?= $produitComplet->unite ?></p>
                            <p><?= $prixTotal ?>$</p>
                            <a href="cart-process.php?action=remove&id=<?= $idASupprimer ?>"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <?php
                    }
                }
            }
        ?>
    </div>
    
    <!--Afficher le coût total du panier-->
    <?php
    $prixPanier = number_format($prixPanier, 2);
    ?>
    <p>Coût total : <?= $prixPanier ?>$</p>
    <button onclick="location.href='index.php'" class="standard-button">Continuer votre magasinage</button>
</div>
<?php

$content = ob_get_clean();

require('includes/template.php');
?>