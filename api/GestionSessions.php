<?php

namespace API;

/**
 * @soap
 */
class GestionSessions {

    private $modelEtablissement;
    private $modelSession;

    public function __construct() {
        $this->modelEtablissement = $GLOBALS['em']->getRepository('\\Models\\Etablissement');
        $this->modelSession = $GLOBALS['em']->getRepository('\\Models\\Session');
    }

    /**
     * Renvoie la liste de tous les établissements.
     * 
     * @soap
     * @cli
     * @return Models\Etablissement[]
     */
    public function getEtablissements() {
        return $this->modelEtablissement->findAll();
    }
    
    /**
     * Renvoie un établissement par son ID.
     * Renvoie NULL si aucun établissement ne possède cet ID.
     * 
     * @soap
     * @cli
     * @param int $id L'identifiant.
     * @return Models\Etablissement
     */
    public function getEtablissementByID($id) {
        return $this->modelEtablissement->findOneById(intval($id));
    }
    
    /**
     * Renvoie l'établissement dont la racine de code analytique correspond à celle donnée.
     * Cette méthode renvoie NULL si aucun établissement ne possède cette racine.
     * 
     * @soap
     * @cli
     * @param string $racine Racine analytique de l'établissement.
     * @return Models\Etablissement
     */
    public function getEtablissementByRacine($racine) {
        return $this->modelEtablissement->findOneByRacine((string)$racine);
    }

    /**
     * Renvoie la liste de toutes les sessions enregistrées.
     * 
     * @return Models\Session[]
     */
    public function getSessions() {
        return $this->modelSession->findAll();
    }
    
    /**
     * Renvoie la session portant l'identifiant donné.
     * Cette méthode renvoie NULL si aucune session n'a cet identifiant.
     * 
     * @soap
     * @cli
     * @param int $id L'identifiant.
     * @return Models\Session
     */
    public function getSessionByID($id) {
        return $this->modelSession->findOneById(intval($id));
    }
    
    /**
     * Renvoie la liste des sessions d'un établissement.
     * 
     * @param Models\Etablissement $etablissement L'établissement.
     * @return Models\Session[]
     */
    public function getSessionsByEtablissement(Models\Etablissement $etablissement) {
        if (!isset($etablissement)) return array();
        return $this->modelSession->findByEtablissement($etablissement);
    }
    
    /**
     * Renvoie la liste des sessions d'un établissement.
     * 
     * @soap
     * @cli
     * @param int $id L'ID de l'établissement.
     * @return Models\Session[]
     */
    public function getSessionsByEtablissementID($id) {
        $etablissement = $this->modelEtablissement->findOneById(intval($id));
        if (!$etablissement) return array();
        return $this->modelSession->findByEtablissement($etablissement);
    }
    
    /**
     * Renvoie la liste des sessions de l'année donnée et rattachées à l'établissement.
     * Si l'année n'est pas renseignée, c'est l'année actuelle qui est prise.
     * 
     * @soap
     * @cli
     * @param string $racine Racine analytique de l'établissement d'attache.
     * @param int $year L'année de rentrée de la session.
     * @return Models\Session[]
     */
    public function getSessionsByRacineEtablissementAndYear($racine, $year = 0) {
        $year = intval($year);
        if ($year <= 0) $year = date('Y');
        $qb = $GLOBALS['em']->createQueryBuilder();
        $qb->select('s')
           ->from('Models\\Session', 's')
           ->innerJoin('s.etablissement', 'e', 'WITH', 's.etablissement = e')
           ->where('e.racine = :racine')
           ->andWhere('s.year = :year');
        $qb->setParameters(array(
            'racine' => (string)$racine,
            'year' => $year
        ));
        return $qb->getQuery()->getResult();
    }
    
}