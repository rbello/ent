<?php

require_once BASE . 'models/Produit.php';

/**
 * @soap
 */
class GestionMaterielPeda {

    /**
     * @soap
     * @return string
     */
    public function test() {
        return "It works!";
    }
    
}