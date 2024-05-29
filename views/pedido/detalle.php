
    <h1>Detalles del pedido</h1>

    <?php if (isset($pedido)): ?>

        <?php if (isset($_SESSION['admin'])): ?>
            <h3>Cambiar el estado del pedido</h3>
            <form action="<?=base_url?>pedido/estado" method="post">
                <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
                <select name="estado" id="">
                    <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?> >Pediente</option>
                    <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?> >En preparacion</option>
                    <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?> >Preparado para enviar</option>
                    <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?> >Enviado</option>
                </select>
                <input type="submit" value="Cambiar estado">
            </form>
            <br>
        <?php endif; ?>

        <h3>Dirección de envio:</h3>
        Provincia: <?=$pedido->provincia?> <br>
        Ciudad: <?=$pedido->localidad?> <br>
        Direccion: $<?=$pedido->direccion?> <br> <br>

        <h3>Datos del pedido:</h3>
        Estado: <?=Utils::showStatus($pedido->estado)?> <br>
        Número del pedido: <?=$pedido->id?> <br>
        Total a pagar: $<?=$pedido->coste?> <br>
        Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($product = $products->fetch_object()):?>
                <tr>
                    <th>
                        <?php if($product->imagen != null):?>
                            <img class="img_carrito" src="<?=base_url?>uploads/images/<?=$product->imagen?>">
                        <?php else: ?>
                            <img class="img_carrito" src="<?=base_url?>assets/img/camiseta.png">
                        <?php endif; ?>
                    </th>
                    <th><a href="<?=base_url?>producto/ver&id=<?=$product->id?>"><?=$product->nombre?></a></th>
                    <th><?=$product->precio?></th>
                    <th><?=$product->unidades?></th>
                </tr>
            <?php endwhile;?>
        </table>
    <?php endif; ?>