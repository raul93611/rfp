CREATE DATABASE rfp
  DEFAULT CHARACTER SET utf8;
USE rfp;


CREATE TABLE usuarios(
        id INT NOT NULL AUTO_INCREMENT UNIQUE,
        nombre_usuario VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL,
        nombres VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        cargo TINYINT NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        PRIMARY KEY(id)
);
