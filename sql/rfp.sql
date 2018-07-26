CREATE DATABASE rfp
  DEFAULT CHARACTER SET utf8;
USE rfp;


CREATE TABLE users(
        id INT NOT NULL AUTO_INCREMENT UNIQUE,
        username VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL,
        names VARCHAR(100) NOT NULL,
        last_names VARCHAR(100) NOT NULL,
        level TINYINT NOT NULL,
        email VARCHAR(100) NOT NULL,
        status TINYINT NOT NULL,
        PRIMARY KEY(id)
);
