<?php

echo "  Install Students...";

$xml = load_xml(BASE . 'system/install/data/Students.xml');

foreach ($xml->student as $student) {
    
    $etatCivil = $student->etatCivil[0];
    $contacts = $student->contacts[0];
    
    $model = new  \Models\Student();
    $model->setId($student['id']);
    $model->setCivilite($etatCivil['civilite']);
    $model->setFirstName($etatCivil['firstName']);
    $model->setLastName($etatCivil['lastName']);
    $model->setBirthDay(DateTime::createFromFormat($format, $etatCivil['birthday']));
    $model->setBirthPlace($etatCivil['birthplace']);
    $model->setNationality($etatCivil['nationality']);
    $model->setEmail($contacts['email']);
    $model->setEmailViacesi($contacts['viacesiMail']);
    $model->setPhoneNumber($contacts['phone']);
    $model->setCellNumber($contacts['cell']);
    $model->setAddressCity($contacts['city']);
    $model->setAddressPostalCode($contacts['postalCode']);
    
    $em->flush();
    
}

echo " OK!\n";
