<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/CartProduct.php'));

class CartProductFactory extends FactoryBase
{
    public function getAllCartProducts()
    {
        $cartProducts = array();

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_panier ORDER BY Id');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $cartProducts[] = new CartProduct($row);
        }

        $stmt->closeCursor();

        return $cartProducts;
    }

    public function getCartProduct($produitId)
    {
        $cartProduct = null;

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_panier WHERE ProduitId = ?');
        $stmt->execute([$produitId]);
        
        if ($row = $stmt->fetch()) {
            $cartProduct = new CartProduct($row);
        }
        
        $stmt->closeCursor();

        return $cartProduct;
    }

    
    public function addProduct($produitId, $quantite, $token)
    {
        $db = $this->dbConnect();

        $itemAjoute = $this->getCartProduct($produitId);
        $nouvelleQuantite = $itemAjoute->quantite + $quantite;

        if($itemAjoute->token == $_COOKIE['token']) {
            $stmt = $db->prepare("UPDATE tp1_paniers SET Quantite=? WHERE ProduitId=? AND Token=?");
            $affectedRows = $stmt->execute([$nouvelleQuantite, $produitId, $token]);
        }
        else {
            $stmt = $db->prepare('INSERT INTO tp1_panier (ProduitId, Quantite, Token) VALUES (?,?,?)');
            $affectedRows = $stmt->execute([$produitId, $quantite, $token]);
            $stmt->closeCursor();
        }
        
        return $affectedRows;
    }

    public function removeProduct($id) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM tp1_panier WHERE Id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        $stmt->closeCursor();
    }
    
}
