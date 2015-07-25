<?php

namespace Models;

/**
 * @Entity
 * @Table(name="sessions")
 **/
class Session
{

    /** @Id @Column(type="integer") **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="string", length=10, unique=true) **/
    protected $codeAnalytique;
    
    /** @Column(type="string", columnDefinition="ENUM('A1', 'A2', 'A1+A2', 'A3', 'A3+4L', 'A3+A4R', 'A3L', 'A3R', 'A4', 'A4L', 'A4R', 'A5')") */
    protected $sessionType;
    
    /** @Column(type="date") **/
    protected $sessionBegin;
    
    /** @Column(type="date") **/
    protected $sessionEnd;
    
    /** @Column(type="float") **/
    protected $durationHours;
    
    /** @Column(type="integer", length=4) **/
    protected $year;

}