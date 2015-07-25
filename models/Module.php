<?php

namespace Models;

/**
 * @Entity
 * @Table(name="modules")
 **/
class Module
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @ManyToOne(targetEntity="UE", inversedBy="modules") **/
    protected $ue;
    
    /**
     * @OneToMany(targetEntity="ElementEvaluable", mappedBy="module")
     * @var ElementEvaluable[]
     **/
    protected $elementsEvaluables = null;
    
}