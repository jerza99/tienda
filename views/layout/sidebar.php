    <!-- barra lateral  -->
    <aside id="lateral">

        <div id="carrito" class="block_aside">
            <h3>Mi carrito</h3>
            <ul>
                <?php $stats =Utils::statsCarrito()?>
                <li><a href="<?=base_url?>carrito/index">Ver carrito</a></li>
                <li><a href="<?=base_url?>carrito/index">Productos (<?=$stats['count']?>)</a></li>
                <li><a href="<?=base_url?>carrito/index">Total: $<?=$stats['total']?></a></li>
            </ul>
        </div>

        <div id="login" class="block_aside">

            <?php if (!isset($_SESSION['identity'])):?>
            <h3>Entrar a la web</h3>
            <!-- Formulario -->
            <form action="<?=base_url?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="enviar">
            </form>
            <?php else:?>
                <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
            <?php endif;?>
            <!-- enlaces -->
            <ul>
                <?php if (isset($_SESSION['admin'])):?>
                    <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
                    <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
                    <li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
                <?php endif;?>
                <?php if (isset($_SESSION['identity'])):?>
                    <li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
                    <li><a href="<?=base_url?>/usuario/logout">Cerrar Sesion</a></li>
                    <?php else:?>
                    <li><a href="<?=base_url?>/usuario/registro">Registrate aquí</a></li>
                <?php endif;?>
            </ul>
        </div>
    </aside>
    <!-- contenido central -->
    <div id="cental">