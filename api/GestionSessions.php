<?php

require_once BASE . 'models/Session.php';

/**
 * @soap
 */
class GestionSessions {

    /**
     * @soap
     * @cli
     * @return Session[]
     */
    public function getSessions() {
        return array();
    }
    
    /**
     * @soap
     * @cli
     * @param int $id
     * @return Session|null
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
    
    /**
     * @soap
     * @cli
     * @return int
     * @usage test <X> [Y]
     * @usage test <name>
     */
    public function test() {
        return 27;
    }
    
}