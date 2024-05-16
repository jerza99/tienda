

    <h1>Mis pedidos</h1>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php
        foreach ($carrito AS $index => $element):
            $product = $element['producto'];
            ?>
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
                <th><?=$element['unidades']?></th>
            </tr>
        <?php endforeach;?>
    </table>