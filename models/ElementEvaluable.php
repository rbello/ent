<?php

/**
 * @Entity
 * @Table(name="elementsevaluables")
 **/
class ElementEvaluable
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @ManyToOne(targetEntity="Module", inversedBy="elementsEvaluables") **/
    protected $module;
    
}