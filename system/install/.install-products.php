<?php

echo "  Install Products, UE and Modules...\n";

$xml = load_xml(BASE . "system/install/data/{$dataset}/Modules-X.xml");

$total = $xml->produit->count();

$i = 0;

foreach ($xml->produit as $produit) {
    
    $model = new  \Models\Produit();
    $model->setId($produit['id']);
    $model->setName($produit['name']);
    $model->setReferentiel($produit['referentiel']);
    $model->setDate(DateTime::createFromFormat($format, $produit['date']));
    
    $em->persist($model);
    $em->flush();
    
    $u = 0;
    
    $total += $produit->ue->count();
    
    foreach ($produit->ue as $ue) {
        
        $submodel = new \Models\UE();
        $submodel->setCode($ue['id']);
        $submodel->setName($ue['name']);
        $submodel->setAxePeda($ue['axePeda']);
        $submodel->setEcts(intval($ue['ects']));
        $submodel->setProduct($model);
        
        $em->persist($submodel);
        
        $em->flush();
        
        /*$m = 0;
        
        foreach ($ue->module as $module) {
            
            $nmodel = new \Models\Module();
            $nmodel->setName($module['name']);
            $nmodel->setUE($submodel);
            
            $em->persist($nmodel);
            
            // Limit
            if ($test_limit_data && $m++ > 4) break;
            
        }
        
        $em->flush();*/

        progressBar($i++, $total);
        
        if ($test_limit_data && $u++ > 4) break;
        
    }
    
    $em->flush();
    
    progressBar($i++, $total);
    
}

progressBar($i, $total);

echo " OK!\n";
