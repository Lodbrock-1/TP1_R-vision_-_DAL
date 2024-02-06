<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Product.php'));

class ProductFactory extends FactoryBase
{
    public function getAllProducts()
    {
        $products = array();

        $db = $this->dbConnect();

        $stmt = $db->prepare('SELECT * FROM tp1_produits ORDER BY Nom');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $products[] = new Product($row);
        }

        $stmt->closeCursor();

        return $products;
    }

    public function getProduct($id)
    {
        $product = null;

        $db = $this->dbConnect();

        $stmt = $db->prepare('SELECT * FROM tp1_produits WHERE Id ='.$id);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $product[] = new Product($row);
        }

        $stmt->closeCursor();

        return $product;
    }

}

?>