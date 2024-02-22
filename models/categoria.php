<?php 

    class Categoria{
        private $id;
        private $nombre;
        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function getAll(){
            $sql= "SELECT * FROM categorias ORDER BY id DESC;";
            $categorias = $this->db->query($sql);
            return $categorias;
        }

        public function getOne(){
            $sql= "SELECT * FROM categorias WHERE id={$this->getId()};";
            $categoria = $this->db->query($sql);
            return $categoria->fetch_object();
        }

        public function save(){
            $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
            $save = $this->db->query($sql); 

            $result = false;

            if ($save) {
                $result = true;
            }
            return $result;
        }
    }