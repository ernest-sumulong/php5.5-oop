<?php
    spl_autoload_register(function($class){

        $class = str_replace("\\",DIRECTORY_SEPARATOR,$class);

        $rootPath = __DIR__.DIRECTORY_SEPARATOR;

        $filePath = $rootPath.$class.'.php';

        if(file_exists($filePath)) {
            require_once($filePath);
        }
    });
?>