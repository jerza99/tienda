<?php

    require_once 'models/producto.php';

    class productoController{
        public function index(){

            $producto = new Producto();
            $productos = $producto->getRandom(6);
            
            // Renderizar vista 
            require_once 'views/producto/destacado.php';
        }

        public function ver(){

            if (isset($_GET['id'])) {

                $id = $_GET['id'];

                $producto = new Producto();
                $producto->setId($id);

                $pro = $producto->getOne();
            }
            require_once 'views/producto/ver.php';
        }

        public function gestion(){
            Utils::isAdmin();

            $producto = new Producto();
            $productos = $producto->getAll();

            require_once 'views/producto/gestion.php';
        }

        public function crear(){
            Utils::isAdmin();
            require_once 'views/producto/crear.php';
        }

        public function save(){
            Utils::isAdmin();
            if ($_POST) {
                $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']: false;
                $precio = isset($_POST['precio']) ? $_POST['precio']: false;
                $stock = isset($_POST['stock']) ? $_POST['stock']: false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria']: false;
                // $imagen = isset($_POST['imagen']) ? $_POST['imagen']: false;

                if ($nombre && $descripcion && $precio && $stock && $categoria) {
                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setCategoria_id($categoria);

                    // Subida del archivo y guardar

                    if (isset($_FILES['imagen'])) {
                        $file = $_FILES['imagen'];
                        $filename = $file['name'];
                        $mimetype = $file['type'];

                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/gif") {

                            $destino = 'uploads/images/';

                            if (!is_dir($destino)) {
                                mkdir($destino, 0777 , true);
                            }

                            $ruta = $destino . $filename;

                            $producto->setImagen($filename);
                            move_uploaded_file($file['tmp_name'], $ruta);
                        }
                    }

                    if ($_GET['id']) {
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $save = $producto->edit();
                    } else {
                        $save = $producto->save();
                    }

                    if ($save) {
                        $_SESSION['producto'] = "complete";
                    }else {
                        $_SESSION['producto'] = "failed";
                    }
                }else {
                    $_SESSION['producto'] = "failed";
                }
            }else {
                $_SESSION['producto'] = "failed";
            }
            header('Location:'.base_url.'producto/gestion');
        }

        public function editar(){
            Utils::isAdmin();

            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $edit = true;

                $producto = new Producto();
                $producto->setId($id);
                $pro = $producto->getOne();
                
                require_once 'views/producto/crear.php';
            } else {
                header("Location:".base_url."producto/gestion");
            }
            
        }

        public function eliminar(){
            Utils::isAdmin();

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $producto = new Producto();
                $producto->setId($id);
                $delete = $producto->delete();
                if ($delete) {
                    $_SESSION['delete'] = "complete";
                } else {
                    $_SESSION['delete'] = "failed";
                } 
            }else {
                $_SESSION['delete'] = "failed";
            }
            header("Location:".base_url."producto/gestion");
        }
    }