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
    protected $name;
    
    /** @Column(type="string") **/
    protected $referentiel;
    
    /** @Column(type="string") **/
    protected $date;
    
    /**
     * @OneToMany(targetEntity="UE", mappedBy="product")
     * @var UE[]
     **/
    protected $ues = null;
    
    public static function create($id, $name, $referentiel, $date) {
        $e = new Produit();
        $e->id = $id;
        $e->name = $name;
        $e->referentiel = $referentiel;
        $e->date = $date;
        return $e;
    }

}