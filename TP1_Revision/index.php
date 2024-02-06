<?php 
require_once('dal/DAL.php');
$dal = new DAL();
$products = $dal->ProductFact()->getAllProducts();

ob_start();
?>

<h1 class="title">Nos produits disponibles</h1>
<div class="product-list">
<?php
foreach ($products as $prod){
    ?>
    <div class="product-item">
        <div class="product-image">
            <img src="css/img/<?php echo($prod->getImage()); ?>" alt="imgProduct"/> 
        </div>
        <?php echo ("<p>".$prod->getName()."</p>"); ?> 
        <button class="standard-button" onclick="location.href='product-view.php?produitId=<?php echo($prod->getId());?>'">Ajoutez au panier</button>
    </div>
    <?php
}
?> 
</div>
<?php
$content = ob_get_clean(); 
require_once('includes/template.php'); 
?> 
