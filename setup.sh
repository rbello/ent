#!/bin/sh

case "$1" in

    clean)
        rm -rf vendor/
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
        echo "Install data..."
        php system/install/installer.php
        ;;

    *)
        echo "Usage: setup <install|update|clean>"
        ;;
esac