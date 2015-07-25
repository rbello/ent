#!/bin/sh

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
        php system/lib/doctrine/orm/bin/doctrine orm:generate:entities system
        echo "Install data..."
        php system/install/installer.php
        ;;

    *)
        echo "Usage: setup <install|update|clean>"
        ;;
esac