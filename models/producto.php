<?php 

    class Producto{
        private $id;
        private $categoria_id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $fecha;
        private $imagen;
        private $db;
       	
        public function __construct(){
            $this->db = Database::connect();;
        }
        public function getId() {
            return $this->id;
        }

        public function getCategoria_id() {
            return $this->categoria_id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getStock() {
            return $this->stock;
        }

        public function getOferta() {
            return $this->oferta;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getImagen() {
            return $this->imagen;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setCategoria_id($categoria_id){
            $this->categoria_id = $categoria_id;
        }

        public function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }

        public function setPrecio($precio){
            $this->precio = $this->db->real_escape_string($precio);
        }

        public function setStock($stock){
            $this->stock = $this->db->real_escape_string($stock);
        }

        public function setOferta($oferta){
            $this->oferta = $this->db->real_escape_string($oferta);
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getAll(){
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $produtos = $this->db->query($sql);
            return $produtos;
        }

        public function getAllCategory(){
            
            $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p"
            . " INNER JOIN categorias c ON c.id = p.categoria_id"
            . " WHERE p.categoria_id = {$this->getCategoria_id()}"
            . " ORDER BY id DESC";

            $produtos = $this->db->query($sql);
            return $produtos;
        }

        public function getOne(){
            $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
            $produto = $this->db->query($sql);
            return $produto->fetch_object();
        }

        public function getRandom($limit){
            $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
            $produto = $this->db->query($sql);
            return $produto;
        }

        public function save(){
            $sql = "INSERT INTO productos VALUES(null, '{$this->getCategoria_id()}' , '{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()}, {$this->getStock()},null, CURDATE(), '{$this->getImagen()}');";
            $save = $this->db->query($sql); 

           
            $result = false;

            if ($save) {
                $result = true;
            }
            return $result;
        }

        public function edit(){ 

            $sql = "UPDATE productos SET nombre = '{$this->getNombre()}', descripcion ='{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock ={$this->getStock()} , categoria_id ={$this->getCategoria_id()}";
            
            if ($this->getImagen() != null) {
                $sql .= ", imagen='{$this->getImagen()}'";
            }
            $sql .= " WHERE id = {$this->id};";

            $save = $this->db->query($sql); 

           
            $result = false;

            if ($save) {
                $result = true;
            }
            return $result;
        }

        public function delete(){
            $sql = "DELETE FROM productos WHERE id={$this->id}";
            $delete = $this->db->query($sql);

            $result = false;

            if ($delete) {
                $result = true;
            }
            return $result;
        }

    }