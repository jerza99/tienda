<?php 

    // Clase pasa conecion a la base de datos.

    class Database{

        // Metodo estatico para establecer una conexión con una base de datos MySQL y configurar el conjunto de caracteres de la conexión.

        public static function connect(){

            // Variables
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'tienda';

            $db = new mysqli($host, $username, $password, $database);
            $db->query("SET NAMES 'utf8'"); 
            return $db;
        } 
    }
