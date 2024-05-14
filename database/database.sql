
    /*BASE DE DATOS PARA ESCUELA*/
    CREATE DATABASE tienda;
    USE tienda;

    CREATE TABLE usuarios(
        id          int(255) AUTO_INCREMENT NOT NULL,
        nombre      VARCHAR(100)NOT NULL,
        apellidos   VARCHAR(255),
        email       VARCHAR(255)NOT NULL,
        password    VARCHAR(255)NOT NULL,
        rol         VARCHAR(20),
        imagen      VARCHAR(100),
        CONSTRAINT pk_usuarios PRIMARY KEY(id),
        CONSTRAINT uq_email UNIQUE(email)
    )ENGINE=INNODB;

    INSERT INTO usuarios VALUES(
        null,
        'Admin',
        'Admin',
        'admin@admin.com',
        'contraseña',
        'admin',
        null
    );

    CREATE TABLE categorias(
        id          int(255) AUTO_INCREMENT NOT NULL,
        nombre      VARCHAR(100)NOT NULL,
        CONSTRAINT pk_categorias PRIMARY KEY(id)
    )ENGINE=INNODB;

    INSERT INTO categorias VALUES(null, 'Manga corta');
    INSERT INTO categorias VALUES(null, 'Tirantes');
    INSERT INTO categorias VALUES(null, 'Manga larga');
    INSERT INTO categorias VALUES(null, 'Sudaderas');

    CREATE TABLE productos(
        id              INT(255) AUTO_INCREMENT NOT NULL,
        categoria_id    INT(255) NOT NULL,
        nombre          VARCHAR(100)NOT NULL,
        descripcion     TEXT,
        precio          FLOAT(100,2)NOT NULL,
        stock           INT(255)NOT NULL,
        oferta          VARCHAR(2),
        fecha           DATE NOT NULL,
        imagen          VARCHAR(255),
        CONSTRAINT pk_categorias PRIMARY KEY(id),
        CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
    )ENGINE=INNODB;


    CREATE TABLE pedidos(
        id              INT(255) AUTO_INCREMENT NOT NULL,
        usuario_id      INT(255) NOT NULL,
        provincia       VARCHAR(100) NOT NULL,
        localidad       VARCHAR(100) NOT NULL,
        direccion       VARCHAR(255) NOT NULL,
        coste           FLOAT(200,2) NOT NULL,
        estado          VARCHAR(20) NOT NULL,
        fecha           DATE,
        hora            TIME,
        CONSTRAINT pk_pedidos PRIMARY KEY(id),
        CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
    )ENGINE=INNODB;

    CREATE TABLE lineas_pedidos(
        id              INT(255) AUTO_INCREMENT NOT NULL,
        pedido_id       INT(255) NOT NULL,
        producto_id     INT(255) NOT NULL,
        unidades        INT(255) NOT NULL,
        CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
        CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
        CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
    )ENGINE=INNODB;


    