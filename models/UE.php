<?php

/**
 * @Entity
 * @Table(name="ues")
 **/
class UE
{

    /** @Id @Column(type="integer") **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="string") **/
    protected $axePeda;
    
    /** @Column(type="integer") **/
    protected $ects;
    
    /** @ManyToOne(targetEntity="Produit", inversedBy="ues") **/
    protected $product;
    
    /**
     * @OneToMany(targetEntity="Module", mappedBy="ue")
     * @var Module[]
     **/
    protected $modules = null;
    
}