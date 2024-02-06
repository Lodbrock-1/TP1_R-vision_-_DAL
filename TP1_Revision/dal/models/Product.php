<?php
class Product
{
    public $Name;
    public $Prix;
    public $Image;
    public $Unite;
    public $Id;
    public $Quantite;

    public function getName()
    {
        return $this->Name;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function getUnite()
    {
        return $this->Unite;
    }

    public function getQuantite()
    {
        return $this->Quantite;
    }

    public function getPrix()
    {
        return $this->Prix;
    }

    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
            $this->Id = $sql_row['Id'];
            $this->Name = $sql_row['Nom'];
            $this->Quantite = $sql_row['Quantite'];
            $this->Unite = $sql_row['Unite'];
            $this->Image = $sql_row['Image'];
            $this->Prix = $sql_row['Prix'];
        }
    }
}
?>