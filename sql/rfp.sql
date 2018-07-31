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

CREATE TABLE projects(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_user INT NOT NULL,
  project_date DATE,
  link VARCHAR(255) NOT NULL,
  project_name VARCHAR(255) NOT NULL,
  start_date DATE,
  end_date DATETIME,
  priority VARCHAR(255) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  way VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_user)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);
