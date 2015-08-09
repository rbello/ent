<?php

/**
 * @soap
 */
class GestionSessions {

    /**
     * @soap
     * @cli
     * @return Models\Session[]
     */
    public function getSessions() {
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
    
    /**
     * @soap
     * @cli
     * @alias getSessionById
     */
    public function getSession($id) {
        return $this->getSessionById($id);
    }
    
}