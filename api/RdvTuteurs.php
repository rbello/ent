<?php

include_once BASE . 'models/Etudiant.php';

/**
 * @WebService
 * @soap
 */
class RdvTuteurs {

    /**
     * @soap
     * @return int
     */
    public function test() {
        return time();
    }
    
    /**
     * @soap
     * @return \Models\Etudiant[]
     */
    public function getAll() {
        
        $a = new \Models\Etudiant();
        $a->setId(100);
        $b = new \Models\Etudiant();
        $b->setId(200);
        return array(
            $a,
            $b
        );
    }
    
    /**
     * @soap
     * @return float[]
     */
    public function Floating() {
        return array(1.1618, 2.9446, 3.1589, 0.7915, 0.0359, 9.8510, 8.8598, 1.4806, 7.0315);
    }

}