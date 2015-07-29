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
        ;;
        
    clean-db)
        php $SCRIPT/system/install/truncate-db.php
        ;;
        
    update)
        echo "Update dependencies..."
        composer update
        ;;
        
    install)
        echo "Update dependencies..."
        composer update
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
        
    *)
        echo "Usage: setup <option>"
        echo "Options are:"
        echo "   install            Installation du système."
        echo "   install-data       Installer les données samples."
        echo "   update             Mettre à jour les dépendances."
        echo "   mapinf <entity>    Affiche les informations de mapping de l'entité."
        echo "   clean-db           Nettoyer toutes les données de la base."
        echo "   clean-all          Nettoyer tous les fichiers propres à l'installation."
        ;;
esac