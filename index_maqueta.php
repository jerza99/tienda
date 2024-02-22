<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div id="container">
            <!-- cabezera -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="camiseta Logo">
                    <a href="">
                        Tienda de camisetas
                    </a>
                </div>
            </header>
            <!-- menu -->
            <nav id="menu" >
                <ul>
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Categoria 1</a></li>
                    <li><a href="">Categoria 2</a></li>
                    <li><a href="">Categoria 3</a></li>
                    <li><a href="">Categoria 4</a></li>
                    <li><a href="">Categoria 5</a></li>
                </ul>
            </nav>
            <div id="content">
                <!-- barra lateral  -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <h3>Entrar a la web</h3>
                        <!-- Formulario -->
                        <form action="#" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password">
                            <input type="submit" value="enviar">
                        </form>
                        <!-- enlaces -->
                        <ul>
                            <li><a href="">Mis pedidos</a></li>
                            <li><a href="">Gestionar pedidos</a></li>
                            <li><a href="">Gestionar categorias</a></li>
                        </ul>
                    </div>
                </aside>
                <!-- contenido central -->
                <div id="cental">
                    <h1>Productos destacados</h1>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta azul ancha</h2>
                        <p>30 euros</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta azul ancha</h2>
                        <p>30 euros</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta azul ancha</h2>
                        <p>30 euros</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie de pagina  -->
        <footer id="footer">
            <p>Desarrollado por Jerza Badillo Web &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>
</html>