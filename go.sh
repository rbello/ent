#!/bin/sh

SCRIPT="`readlink -e $0`"
SCRIPT="`dirname $SCRIPT`"

case "$1" in

    clean-all)
        rm -rf system/lib
        rm -rf system/Models
        rm -rf system/Proxies
        rm -f composer.lock
        rm -f php_errors.log
        rm -rf system/cache/wsdl
        mkdir system/cache/wsdl
        rm -rf system/cache/sass
        mkdir system/cache/sass
        ;;
        
    clean-db)
        php $SCRIPT/system/install/truncate-db.php
        ;;
        
    update)
        echo "Update dependencies..."
        composer update
        ;;
        
    install)
        echo "Install required applications...";
        gem install sass
        gem install compass
        echo "Update client dependencies...";
        #bower install ng-table
        bower install --save GoogleWebComponents/google-map
        echo "Update server dependencies..."
        composer update
        echo "Generate CSS and JavaScripts..."
        compass compile
        ./go.sh js
        #echo "Generate entities..."
        #php $SCRIPT/system/lib/doctrine/orm/bin/doctrine orm:generate-entities --regenerate-entities=true --verbose --generate-annotations=true -- system
        #echo "Fix entities..."
        #php $SCRIPT/system/install/fixentities.php $SCRIPT/system/Models
        echo "Prepare SQL database..."
        php $SCRIPT/system/lib/doctrine/orm/bin/doctrine orm:schema-tool:create
        ;;
        
    install-data)
        echo "Install data..."
        php $SCRIPT/system/install/installer.php
        ;;

    mapinf)
        echo "ORM mapping info for: $2"
        php $SCRIPT/system/lib/doctrine/orm/bin/doctrine orm:mapping:describe $2
        ;;
        
    cli)
        chmod +x $SCRIPT/system/cli.php
        $SCRIPT/system/cli.php $2 $3 $4 $5 $6 $7 $8 $9
        ;;
        
    css)
        compass watch --trace
        ;;
        
    js)
        cat www/js/utils.js www/js/main.js www/js/auth.js www/js/AppCtrl.js > www/res/ent.js
        java -jar system/lib/bin/yuicompressor.jar www/res/ent.js -o www/res/ent-min.js
        ;;
        
    compile)
        ./go.sh js
        compass compile
        ;;
        
    *)
        echo "Usage: setup <option>"
        echo "Options are:"
        echo "   install            Installation du système."s
        echo "   install-data       Installer les données samples."
        echo "   update             Mettre à jour les dépendances."
        echo "   css                Générer les fichiers CSS à partir des fichiers SASS."
        echo "   js                 Générer les fichiers JS minifiés."
        echo "   compile            Genérer CSS + JavaScripts"
        echo "   mapinf <entity>    Affiche les informations de mapping de l'entité."
        echo "   clean-db           Nettoyer toutes les données de la base."
        echo "   clean-all          Nettoyer tous les fichiers propres à l'installation."
        echo "   cli                Executer une commande sur le système via l'interface CLI."
        ;;
esac