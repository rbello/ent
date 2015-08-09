<?php

/**
 * @soap
 */
class GestionSessions {

    /**
     * @soap
     * @cli
     * @return Models\Etablissement[]
     */
    public function getEtablissements() {
        $repo = $GLOBALS['em']->getRepository('\\Models\\Etablissement');
        return $repo->findAll();
    }
    
    /**
     * @soap
     * @cli
     * @return Models\Etablissement
     */
    public function getEtablissementById($id) {
        $repo = $GLOBALS['em']->getRepository('\\Models\\Etablissement');
        return $repo->findOneById($id);
    }
    
    /**
     * @soap
     * @cli
     * @return Models\Etablissement
     */
    public function getEtablissementByRacine($racine) {
        $repo = $GLOBALS['em']->getRepository('\\Models\\Etablissement');
        return $repo->findOneByRacine($racine);
    }

    /**
     * @return Models\Session[]
     */
    public function getSessions() {
        // TODO
        return array();
    }
    
    /**
     * @soap
     * @cli
     * @param int $id
     * @return Models\Session
     */
    public function getSessionById($id) {
        $repo = $GLOBALS['em']->getRepository('\\Models\\Session');
        return $repo->findOneById(intval($id));
    }
    
}