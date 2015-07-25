<?php

/**
 * @Entity
 * @Table(name="notes")
 **/
class Note
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @ManyToOne(targetEntity="Inscription", inversedBy="notes") **/
    protected $inscription;
    
    /** @ManyToOne(targetEntity="ElementEvaluable") **/
    protected $elementEvaluable;
    
    /** @Column(type="string", columnDefinition="ENUM('A', 'B', 'C', 'Cna', 'Cac' 'D')") */
    protected $value;
    
}