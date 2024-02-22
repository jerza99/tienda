<?php 

    require_once 'models/categoria.php';
    require_once 'models/producto.php';

    // Define clase con tres metodos index, crear y save.

    class categoriaController{

        // Crea un objeto que verifica si es admin y a su vez muestra las categorias de la base de datos 
        public function index(){
            Utils::isAdmin();
            $categoria = new Categoria();
            $categorias = $categoria->getAll();
            require_once 'views/categoria/index.php';
        }

        public function ver(){

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Conseguir categoria
                $categoria = new Categoria();
                $categoria->setId($id);
                $categoria = $categoria->getOne();

                // Conseguir producto
                $producto = new Producto();
                $producto->setCategoria_id($id);
                $productos = $producto->getAllCategory();

            }
            
            require_once 'views/categoria/ver.php';
        }

        // Incluye la vista para crear una nueva categoría.
        public function crear(){
            Utils::isAdmin();
            require_once 'views/categoria/crear.php';
        }

        // Metodo para gurdar una nueva categoria
        public function save(){
            Utils::isAdmin();
            if (isset($_POST) && isset($_POST['nombre'])) {
                // Guardar categoria en bd
                $categoria = new Categoria();
                $categoria->setNombre($_POST['nombre']);
                $save = $categoria->save();
            }
            header("Location:".base_url."categoria/index");
        }
    }