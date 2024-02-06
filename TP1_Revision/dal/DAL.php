<?php

require_once(realpath(__DIR__ . '/factories/ProductFactory.php'));
require_once(realpath(__DIR__ . '/factories/CartProductFactory.php'));

class DAL
{
    private $ProductFact = null;
    private $cartProductFact = null;

    public function ProductFact()
    {
        if ($this->ProductFact == null) {
            $this->ProductFact = new ProductFactory();
        }

        return $this->ProductFact;
    }

    public function CartProductFact()
    {
        if ($this->cartProductFact == null) {
            $this->cartProductFact = new CartProductFactory();
        }

        return $this->cartProductFact;
    }
}
