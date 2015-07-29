<?php

echo "  Install Students...";

$xml = load_xml(BASE . 'system/install/data/Students.xml');

$repoStudent = $em->getRepository('\\Models\\Etudiant');

$s = 0;

foreach ($xml->student as $student) {
    
    $etatCivil = $student->etatCivil[0];
    $contacts = $student->contacts[0];
    
    if ($repoStudent->findOneBy(array('emailViacesi' => $contacts['viacesiMail']))) {
        // Doublon
        continue;
    }
    
    $model = new  \Models\Etudiant();
    $model->setId($student['id']);
    $model->setCivilite($etatCivil['civilite']);
    $model->setFirstName($etatCivil['firstName']);
    $model->setLastName($etatCivil['lastName']);
    $date = DateTime::createFromFormat($format, $etatCivil['birthday']);
    $model->setBirthDay($date ? $date : null);
    $model->setBirthPlace($etatCivil['birthplace']);
    $model->setNationality($etatCivil['nationality']);
    $model->setEmail($contacts['email']);
    $model->setEmailViacesi($contacts['viacesiMail']);
    $model->setPhoneNumber($contacts['phone']);
    $model->setCellNumber($contacts['cell']);
    $model->setAddressCity($contacts['city']);
    $model->setAddressPostalCode($contacts['postalCode']);
    
    $em->persist($model);
    
    //if ($s % 50 === 0) 
    $em->flush();
    
    if ($s++ > 99 && $test_limit_data) break;
    
}

$em->flush();

echo " OK!\n";
