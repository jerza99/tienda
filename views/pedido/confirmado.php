
    <?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
        <h1>Tu pedido se ha confirmado</h1>

        <p>Tu pedido se ha guardado con exito, una vez que realices la transferencia
            bancaria a la cuenta 7382947289239ADD con el coste del pedido, será procesado y enviado.
        </p>

        <br>
    <?php if (isset($pedido)): ?>
            <h3>Datos del pedido:</h3>
            <br>
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

    <?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
        <h1>Tu pedido no se ha confirmado</h1>
    <?php endif; ?>
