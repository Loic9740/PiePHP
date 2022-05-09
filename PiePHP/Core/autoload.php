<?php
namespace Core;
    function register()
    {
        spl_autoload_register(function ($auto) {
            $fichier = str_replace('\\','/', $auto) . '.php';
            if (file_exists($fichier)) { 
                require $fichier;
            }
        });
    }
register();
