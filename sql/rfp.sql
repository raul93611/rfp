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
  start_date DATE,
  link VARCHAR(255) NOT NULL,
  project_name VARCHAR(255) NOT NULL,
  end_date DATETIME,
  priority VARCHAR(255) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  way VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  flowchart_comments TEXT CHARACTER SET utf8 NOT NULL,
  flowchart TINYINT NOT NULL,
  designated_user TINYINT NOT NULL,
  reviewed_project TINYINT NOT NULL,
  priority_color VARCHAR(255) NOT NULL,
  create_part_comments TEXT CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_user)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE services(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_project INT NOT NULL,
  total DECIMAL(10,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_project)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE costs(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_service INT NOT NULL,
  description VARCHAR(255) NOT NULL,
  amount DECIMAL(10,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_service)
    REFERENCES services(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE engineers(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_service INT NOT NULL,
  hourly_rate DECIMAL(10,2),
  rate DECIMAL(10,2),
  office_expenses DECIMAL(10,2),
  burdened_rate DECIMAL(10,2),
  fblr DECIMAL(10,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_service)
    REFERENCES services(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);
