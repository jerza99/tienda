<?php 

    
  function controllers_autoload($classname) {
        $directory = __DIR__ . '/controllers/'; 
        $name = $directory . $classname . '.php';

        if (file_exists($name)) {
            require_once $name;
        } else {
            throw new Exception("Archivo no encontrado: {$name}");
        }
    }

    spl_autoload_register('controllers_autoload');