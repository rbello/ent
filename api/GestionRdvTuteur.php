<?php

require_once BASE . 'models/Etudiant.php';

/**
 * @soap
 */
class GestionRdvTuteur {

    /**
     * @soap
     * @return string
     */
    public function test() {
        return "It works!";
    }
    
}