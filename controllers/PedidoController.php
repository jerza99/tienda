<?php 
    require_once 'models/pedido.php';
    class pedidoController{
        public function index(){

            require_once 'views/pedido/index.php';
        }

        public function add(){

            if (isset($_SESSION['identity'])){
                // Variables
                $usuario_id = $_SESSION['identity']->id;
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

                $stats = Utils::statsCarrito();
                $coste = $stats['total'];

                if ($provincia && $localidad && $direccion){
                    // Guardar datos en la base de datos
                    $pedido = new pedido();
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);

                    $save =$pedido->save();

                    // Guardar linea pedido
                    $save_lineas = $pedido->save_linea();

                    if ($save && $save_lineas){
                        $_SESSION['pedido'] = "complete";
                    }else {
                        $_SESSION['pedido'] = "failed";
                    }
                } else {
                    $_SESSION['pedido'] = "failed";
                }
                header('Location: '.base_url.'pedido/confirmado');
            }else{
                // Redirigir al index
                header('Location: '.base_url);
            }
        }

        public function confirmado(){

            if (isset($_SESSION['identity'])){

                $identity = $_SESSION['identity'];
                $pedido = new pedido();
                $pedido->setUsuario_id($identity->id);

                $pedido = $pedido->getOneByUser();

                $pedidos_products = new Pedido();
                $products = $pedidos_products->getProductsByPedidos($pedido->id);

            }
            require_once 'views/pedido/confirmado.php';
        }

        public function mis_pedidos(){
            Utils::isIdentity();
            $usuario_id = $_SESSION['identity']->id;
            $pedido = new Pedido();
            $pedido = $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getAllByUser();
            require_once 'views/pedido/mis_pedidos.php';
        }
    }