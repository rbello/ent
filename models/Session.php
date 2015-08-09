<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

require_once 'Etablissement.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="sessions")
 **/
class Session
{

    /**
     * Identifiant de la session. Correspond au CodeSession dans BORA.
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     **/
    public $id;
    
    /**
     * Nom courant pour cette session.
     * 
     * @ORM\Column(type="string")
     **/
    public $name;
    
    /**
     * Code analytique de la session.
     * Sorte d'identifiant propre au Cesi, il n'est néanmoins par forcément
     * obligatoire, et ils sont recyclés tous les 10 ans.
     * 
     * @ORM\Column(type="string", length=10, unique=false, nullable=true)
     **/
    public $codeAnalytique;
    
    /**
     * Codification simple pour déterminer le type de session Exia.
     * 
     * Historiquement (2005), il y avait 
     *  - La 1ère et 2ème année : eXia premier cycle
     *  - 3ème et 4ème année réunies : eXia MSI Logiciels/Réseaux ou eXia cycle supérieur RIL/RIR
     *  - 5ème année : eXia 5ème année
     * 
     * Ensuite (2010), toutes les années sont séparées sur des sessions différentes :
     *  - A1, A2, A3L, A3R, A4L, A4R, A5
     * 
     * Depuis la CTI (2015), on va vers une fusion des deux spécialités R et L.
     * Il est donc probable qu'on se dirige vers :
     *  - A1, A2, A3, A4, A5
     * 
     * @ORM\Column(type="string", columnDefinition="ENUM('A1', 'A2', 'A1+A2', 'A3', 'A3+4L', 'A3+A4R', 'A3L', 'A3R', 'A4', 'A4L', 'A4R', 'A5')") 
     */
    public $sessionExiaType;
    
    /**
     * Date de début de la session.
     * 
     * @ORM\Column(type="date")
     **/
    public $sessionBegin;
    
    /**
     * Date de fin de la session.
     * 
     * @ORM\Column(type="date")
     **/
    public $sessionEnd;
    
    /**
     * Nombre total d'heures, en face-à-face pédagogique ou autre.
     * 
     * @ORM\Column(type="float")
     **/
    public $durationHours;
    
    /**
     * L'année de rentrée correspondante, et non l'année de promotion.
     * 
     * @ORM\Column(type="integer", length=4)
     **/
    public $year;

    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="sessions")
     * @var Produit
     **/
    protected $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="Etablissement", inversedBy="sessions")
     * @var Etablissement
     **/
    protected $etablissement;

    public function setId($value) {
        $this->id = $value;
    }
    
    public function setName($value) {
        $this->name = $value;
    }
    
    public function setCodeAnalytique($value) {
        $value = strtoupper(trim("{$value}"));
        if (!$value || empty($value)) $value = null;
        $this->codeAnalytique = $value;
    }
    
    public function setYear($value) {
        $this->year = (int) $value;
    }
    
    public function setProduct(Produit $value) {
        $this->product = $value;
    }
    
    public function setEtablissement(Etablissement $value) {
        $this->etablissement = $value;
    }
    
    public function setSessionBegin(\DateTime $value) {
        $this->sessionBegin = $value;
    }
    
    public function setSessionEnd(\DateTime $value) {
        $this->sessionEnd = $value;
    }
    
    public function setDurationHours($value) {
        $this->durationHours = $value;
    }
    
}