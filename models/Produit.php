<?php

namespace Models;

require_once 'UE.php';

/**
 * @Entity
 * @Table(name="produits")
 **/
class Produit
{

    /** @Id @Column(type="integer") **/
    protected $id;
    
    /** @Column(type="string") **/
    public $name;
    
    /** @Column(type="string") **/
    public $referentiel;
    
    /** @Column(type="string") **/
    public $date;
    
    /**
     * @OneToMany(targetEntity="UE", mappedBy="product")
     * @var UE[]
     **/
    protected $ues = null;

    /**
     * Constructeur
     */
    public function __construct($id) {
        $this->id = $id;
    }

}