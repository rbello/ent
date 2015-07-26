<?php

namespace Models;

/**
 * @Entity
 * @Table(name="etablissements")
 **/
class Etablissement
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="string", length=2, unique=true) **/
    protected $racine;
    
}