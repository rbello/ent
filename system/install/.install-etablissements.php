<?php

echo "  Install Etablissements and Sessions...\n";

foreach (glob(BASE . '/system/install/data/Sessions*.xml') as $file) {

    $codeAnalytique = substr(substr($file, -6), 0, 2);
    
    echo "      Processing {$codeAnalytique} sessions...\n";
    
    $centre = load_xml($file);
    
    $model = new Models\Etablissement();
    $model->setName($centre['name']);
    $model->setRacineAnalytique($centre['racine']);
    
    $em->persist($model);
    $em->flush();
    
    foreach ($centre->promo as $promo) {
        foreach ($promo->session as $session) {
            
            $produit = $session->produit[0];
            $team    = $session->team[0];
            $periode = $session->periode[0];
            
            // On cherche le produit de rattachement de cette session
            $find = $repoProduit->findOneBy(array('id' => $produit['code']));
            
            // On n'a pas trouvé le produit !!
            if (!$find) {
                echo "      Error: session {$session['codeAnalytique']} cannot be attached to product '{$produit['name']}' ({$produit['code']})\n";
                continue;
            }
            
            $submodel = new \Models\Session();
            $submodel->setId($session['id']);
            $submodel->setName("TODO");
            $submodel->setCodeAnalytique($session['codeAnalytique']);
            $submodel->setYear($session['year']);
            $submodel->setProduct($find);
            $submodel->setEtablissement($model);
            $submodel->setSessionBegin(DateTime::createFromFormat($format, $periode['begin']));
            $submodel->setSessionEnd(DateTime::createFromFormat($format, $periode['end']));
            $submodel->setDurationHours($periode['duration']);
            
            $em->persist($submodel);
            

        }
        $em->flush();
    }
    
}