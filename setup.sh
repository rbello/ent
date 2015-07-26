#!/bin/sh

SCRIPT="`readlink -e $0`"
SCRIPT="`dirname $SCRIPT`"

case "$1" in

    clean)
        rm -rf system/lib
        rm -rf system/Models
        rm -f composer.lock
        rm -f php_errors.log
        ;;

    update)
        echo "Update dependencies..."
        composer update
        ;;
        
    install)
        echo "Update dependencies..."
        composer update
        echo "Generate entities..."
        php $SCRIPT/system/lib/doctrine/orm/bin/doctrine orm:generate:entities system
        echo "Prepare SQL database..."
        php $SCRIPT/system/lib/doctrine/orm/bin/doctrine orm:schema-tool:create
        echo "Install data..."
        php $SCRIPT/system/install/installer.php
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
        echo "Usage: setup <install|install-data|update|mapinf|clean>"
        ;;
esac