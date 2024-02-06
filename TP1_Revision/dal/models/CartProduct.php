<?php
class CartProduct
{
    public $id;
    public $produitId;
    public $quantite;
    public $token;

    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
            $this->id = $sql_row['Id'];
            $this->produitId = $sql_row['ProduitId'];
            $this->quantite = $sql_row['Quantite'];
            $this->token = $sql_row['Token'];
        }
    }
}
