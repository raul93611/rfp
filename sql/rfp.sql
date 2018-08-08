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
  plane DECIMAL(10,2),
  car DECIMAL(10,2),
  hotel DECIMAL(10,2),
  meals DECIMAL(10,2),
  gas DECIMAL(10,2),
  tools DECIMAL(10,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_project)
    REFERENCES projects(id)
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

CREATE TABLE quotes(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_project INT NOT NULL,
  designated_user TINYINT NOT NULL,
  code VARCHAR(255) NOT NULL,
  type_of_bid VARCHAR(255) NOT NULL,
  total_cost DECIMAL(10,2),
  total_price DECIMAL(10,2),
  comments VARCHAR(255),
  payment_terms VARCHAR(255) NOT NULL,
  address TEXT CHARACTER SET utf8 NOT NULL,
  ship_to TEXT CHARACTER SET utf8 NOT NULL,
  ship_via VARCHAR(255) NOT NULL,
  taxes DECIMAL(10,2) NOT NULL,
  profit DECIMAL(10,2) NOT NULL,
  additional VARCHAR(255) NOT NULL,
  shipping_cost DECIMAL(10,2) NOT NULL,
  shipping VARCHAR(255) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_project)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE items(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_quote INT NOT NULL,
  provider_menor INT NOT NULL,
  brand VARCHAR(255) NOT NULL,
  brand_project VARCHAR(255) NOT NULL,
  part_number VARCHAR(255) NOT NULL,
  part_number_project VARCHAR(255) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  description_project TEXT CHARACTER SET utf8 NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  comments TEXT CHARACTER SET utf8 NOT NULL,
  website VARCHAR(255) NOT NULL,
  additional VARCHAR(100) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_quote)
    REFERENCES quotes(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE providers(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_item INT NOT NULL,
  provider VARCHAR(255) NOT NULL,
  price  DECIMAL(10,2) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_item)
      REFERENCES items(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
);
