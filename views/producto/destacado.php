
<h1>Algunos de nuestros productos destacados</h1>

    <?php while ($product = $productos->fetch_object()):?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
            <?php if($product->imagen != null):?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>">
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/camiseta.png">
            <?php endif; ?>
            <h2><?=$product->nombre?></h2>
        </a>
        <p><?=$product->precio?> euros</p>
        <a href="" class="button">Comprar</a>
    </div>
    <?php endwhile; ?>