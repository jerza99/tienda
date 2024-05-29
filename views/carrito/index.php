    <h1>Carrito de la compra</h1>
    <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Eliminar</th>
            </tr>
            <?php
                foreach ($carrito AS $index => $element):
                    $product = $element['producto'];
                ?>
            <tr>
                <td>
                    <?php if($product->imagen != null):?>
                        <img class="img_carrito" src="<?=base_url?>uploads/images/<?=$product->imagen?>">
                    <?php else: ?>
                        <img class="img_carrito" src="<?=base_url?>assets/img/camiseta.png">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?=base_url?>producto/ver&id=<?=$product->id?>"><?=$product->nombre?></a>
                </td>
                <td>
                    <?=$product->precio?>
                </td>
                <td>
                    <?=$element['unidades']?>
                    <div class="updown-unidades">
                        <a href="<?=base_url?>carrito/up&index=<?=$index?>" class="button">+</a>
                        <a href="<?=base_url?>carrito/down&index=<?=$index?>" class="button">-</a>
                    </div>
                </td>
                <td>
                    <a href="<?=base_url?>carrito/delete&index=<?=$index?>" class="button button-carrito button-red">Quitar producto</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>

        <br>

        <div class="delete-carrito">
            <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
        </div>

        <div class="total-carrito">
            <?php $stats = Utils::statsCarrito() ?>
            <h3>Precio total: $<?=$stats['total']?></h3>
            <a href="<?=base_url?>pedido/index" class="button button-pedido">Hacer el pedido</a>
        </div>

    <?php else: ?>
        <p>El carrito esta vacio, añade algun producto</p>
    <?php endif; ?>