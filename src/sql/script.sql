-- Crea una tabla con los usuarios

CREATE TABLE Usuarios (
    idUsuario TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    perfil VARCHAR(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- Tabla administrador

CREATE TABLE Administrador (
    idAdministrador TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Insertamos cinco usuarios

INSERT INTO Usuarios (correo, password_hash, nombre, perfil)
VALUES ('correo1@gmail.com', 'password1', 'nombre1', 'juego1'),       
       ('correo2@gmail.com', 'password2', 'nombre2', 'juego2'),
       ('correo3@gmail.com', 'password3', 'nombre3', 'juego3'),
       ('correo4@gmail.com', 'password4', 'nombre4', 'juego4'),
       ('correo5@gmail.com', 'password5', 'nombre5', 'juego5');


INSERT INTO Administrador (idUsuario, password_hash)
VALUES ('administrador@gmail.com', 'password1');