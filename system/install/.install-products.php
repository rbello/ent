<?php

echo "  Install Products, UE and Modules...";

$xml = load_xml(BASE . 'system/install/data/Modules-X.xml');

foreach ($xml->produit as $produit) {
    
    $model = new  \Models\Produit();
    $model->setId($produit['id']);
    $model->setName($produit['name']);
    $model->setReferentiel($produit['referentiel']);
    $model->setDate(DateTime::createFromFormat($format, $produit['date']));
    
    $em->persist($model);
    $em->flush();
    
    foreach ($produit->ue as $ue) {
        
        $submodel = new \Models\UE();
        $submodel->setCode($ue['id']);
        $submodel->setName($ue['name']);
        $submodel->setAxePeda($ue['axePeda']);
        $submodel->setEcts(intval($ue['ects']));
        $submodel->setProduct($model);
        
        $em->persist($submodel);
        
        $em->flush();
        
        /*foreach ($ue->module as $module) {
            
            $nmodel = new \Models\Module();
            $nmodel->setName($module['name']);
            $nmodel->setUE($submodel);
            
            $em->persist($nmodel);
            
        }
        
        $em->flush();*/
        
    }
    
    $em->flush();
    
}

echo " OK!\n";
