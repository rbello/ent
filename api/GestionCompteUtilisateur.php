<?php

require_once BASE . 'models/Etudiant.php';

/**
 * @soap
 */
class GestionCompteUtilisateur {

    /**
     * @soap
     * @return string
     */
    public function test() {
        return "It works!";
    }
    
}