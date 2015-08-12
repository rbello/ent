<?php

echo "  Install Etablissements, Sessions and Inscriptions...";

// On parcours les racines des centres analytiques
foreach (glob(BASE . "/system/install/data/{$dataset}/Sessions*.xml") as $file) {

    // On recupère la racine
    $racine = substr(substr($file, -6), 0, 2);
    
    // Verbose
    echo "\n      Processing {$racine} :";
    
    // On fabrique l'établissement
    $data = load_xml($file);
    $etablissement = new Models\Etablissement();
    $etablissement->setName($data['name']);
    $etablissement->setRacineAnalytique($data['racine']);
    $em->persist($etablissement);
    $em->flush();
    unset($data);
    
    // On parcours les années des promotions de ce centre
    foreach (glob(BASE . "/system/install/data/{$dataset}/{$racine}-*.xml") as $file) {

        $promo = load_xml($file);

        echo " {$promo['year']}=";
        
        // Compteur d'inscrits
        $c = 0;
    
        // Compteur de sessions
        $s = 0;
        
        // On parcours les sessions
        foreach ($promo->session as $session) {
    
            // On recupère les infos de la session
            $produit  = $session->produit[0];
            $team     = $session->team[0];          // TODO A gérer !!!
            $periode  = $session->periode[0];
            
            // On cherche le produit de rattachement de cette session
            $find = $repoProduit->findOneBy(array('id' => $produit['code']));
            
            // On n'a pas trouvé le produit !!
            if (!$find) {
                echo "      Warning: session {$session['codeAnalytique']} cannot be attached to product '{$produit['name']}' ({$produit['code']})\n";
                continue;
            }
            
            // On a trouvé une session de plus
            $s++;
    
            // On fabrique la session
            $submodel = new \Models\Session();
            $submodel->setId($session['id']);
            $submodel->setName("TODO");
            $submodel->setCodeAnalytique($session['codeAnalytique']);
            $submodel->setYear($session['year']);
            $submodel->setProduct($find);
            $submodel->setEtablissement($etablissement);
            $submodel->setSessionBegin(DateTime::createFromFormat($format, $periode['begin']));
            $submodel->setSessionEnd(DateTime::createFromFormat($format, $periode['end']));
            $submodel->setDurationHours($periode['duration']);
            $em->persist($submodel);
            $em->flush();
    

            $inscriptions = $session->students[0];
            if (!$inscriptions) {
                continue;
            }
            
            // On parcours les inscriptions
            foreach ($inscriptions->student as $inscription) {
                
                $student = $repoStudent->findOneBy(array('emailViacesi' => $inscription['viacesiMail']));
                
                if (!$student) {
                    echo "\n        Warning: student not found ({$inscription['viacesiMail']})\n";
                    continue;
                }
                
                $c++;
                
                $nmodel = new \Models\Inscription();
                $nmodel->setEtudiant($student);
                $nmodel->setSession($submodel);
                $nmodel->setConfirmed(true); // TODO
                $nmodel->setInscriptionBegin(DateTime::createFromFormat($format,
                    $inscription['begin'] == 'begin' ? $periode['begin'] : $inscription['begin']));
                $nmodel->setInscriptionEnd(DateTime::createFromFormat($format,
                    $inscription['end'] == 'end' ? $periode['end'] : $inscription['end']));
                
                $em->persist($nmodel);
                
            }
            
            $em->flush();
        

        
        }
        
        echo "(S{$s},E{$c})";

    }
    
}

echo "\n    OK!\n";
