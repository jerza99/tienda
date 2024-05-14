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
                    if ($save){
                        $_SESSION['pedido'] = "complete";
                    }else {
                        $_SESSION['pedido'] = "failed";
                    }
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                // Redirigir al index
                header('Location: '.base_url);
            }
        }
    }