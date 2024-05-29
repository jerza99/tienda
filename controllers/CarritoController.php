<?php

    require_once 'models/producto.php';

    class carritoController{

        public function index(){

            if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
                $carrito = $_SESSION['carrito'];
            }else{
                $carrito = array();
            }

            require_once 'views/carrito/index.php';
        }

        public function add(){

            // Obtener el id del producto si no se optiene redireccionar a index
            if (isset($_GET['id'])){
                $producto_id = $_GET['id'];
            }else {
                header('Location:'.base_url);
            }

            if (isset($_SESSION['carrito'])){
                $counter = 0;
                foreach ($_SESSION['carrito'] as $index => $element){
                    if ($element['id_producto'] == $producto_id){
                        $_SESSION['carrito'][$index]['unidades']++;
                        $counter++;
                    }
                }
            }

            if (!isset($counter) || $counter == 0 ) {
                // Conseguir producto
                $product = new Producto();
                $product->setId($producto_id);
                $product = $product->getOne();

                // Añadir al carrito
                if (is_object($product)){
                    $_SESSION['carrito'][] = array(
                        'id_producto' => $product->id,
                        'precio' => $product->precio,
                        'unidades' => 1,
                        'producto' => $product
                    );
                }
            }

            header('Location:'.base_url.'carrito/index');
        }

        public function delete()
        {
            if (isset($_GET['index'])) {
                $index = $_GET['index'];
                unset($_SESSION['carrito'][$index]);
            }
            header('Location:' . base_url . 'carrito/index');
        }

        public function up(){
            if(isset($_GET['index'])){
                $index = $_GET['index'];
                $_SESSION['carrito'][$index]['unidades']++;
            }
            header('Location:'.base_url.'carrito/index');
        }

        public function down(){
            if(isset($_GET['index'])){
                $index = $_GET['index'];
                $_SESSION['carrito'][$index]['unidades']--;
                if($_SESSION['carrito'][$index]['unidades'] == 0){
                    unset($_SESSION['carrito'][$index]);
                }
            }
            header('Location:'.base_url.'carrito/index');
        }

        public function delete_all(){
            unset($_SESSION['carrito']);
            header('Location:'.base_url.'carrito/index');
        }
    }