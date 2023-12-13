-- Crea una tabla con los usuarios

CREATE TABLE Usuarios (
    idUsuario TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    perfil VARCHAR(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE Minijuegos (
    idMinijuego TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    vista VARCHAR(100) NOT NULL,
    subadministrador_id TINYINT UNSIGNED,
    FOREIGN KEY (subadministrador_id) REFERENCES Usuarios(idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Insertamos cinco usuarios

INSERT INTO Usuarios (correo, password_hash, nombre, perfil)
VALUES ('admin@admin.com', 'admin', 'admin', 'a'),       
       ('correo2@gmail.com', 'password2', 'nombre2', 's'),
       ('correo3@gmail.com', 'password3', 'nombre3', 's'),
       ('correo4@gmail.com', 'password4', 'nombre4', 's'),
       ('correo5@gmail.com', 'password5', 'nombre5', 's');

-- Insertamos cinco minijuegos

INSERT INTO Minijuegos (nombre, descripcion, vista, subadministrador_id)
VALUES ('Minijuego1', 'Descripcion1', 'juego1'),
       ('Minijuego2', 'Descripcion2', 'juego2'),
       ('Minijuego3', 'Descripcion3', 'juego3'),
       ('Minijuego4', 'Descripcion4', 'juego4'),
       ('Minijuego5', 'Descripcion5', 'juego5');