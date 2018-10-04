CREATE DATABASE fullfillment
  DEFAULT CHARACTER SET utf8;
USE fullfillment;

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

CREATE TABLE rfq(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  proposal INT NOT NULL,
  id_user INT NOT NULL,
  designated_user INT NOT NULL,
  canal VARCHAR(100) NOT NULL,
  email_code VARCHAR(100) NOT NULL,
  type_of_bid VARCHAR(100) NOT NULL,
  issue_date VARCHAR(100) NOT NULL,
  end_date VARCHAR(100) NOT NULL,
  submitted TINYINT NOT NULL,
  completed TINYINT NOT NULL,
  total_cost DECIMAL(10,2),
  total_price DECIMAL(10,2),
  comments VARCHAR(100),
  award TINYINT NOT NULL,
  completed_date DATE,
  submitted_date DATE,
  award_date DATE,
  payment_terms VARCHAR(100) NOT NULL,
  address TEXT CHARACTER SET utf8 NOT NULL,
  ship_to TEXT CHARACTER SET utf8 NOT NULL,
  expiration_date DATE NOT NULL,
  ship_via VARCHAR(100) NOT NULL,
  taxes DECIMAL(10,2) NOT NULL,
  profit DECIMAL(10,2) NOT NULL,
  additional VARCHAR(100) NOT NULL,
  shipping_cost DECIMAL(10,2) NOT NULL,
  shipping VARCHAR(100) NOT NULL,
  rfp INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_user)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE items(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_rfq INT NOT NULL,
  id_user INT NOT NULL,
  provider_menor INT NOT NULL,
  brand VARCHAR(100) NOT NULL,
  brand_project VARCHAR(100) NOT NULL,
  part_number VARCHAR(100) NOT NULL,
  part_number_project VARCHAR(100) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  description_project TEXT CHARACTER SET utf8 NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  comments TEXT CHARACTER SET utf8 NOT NULL,
  website VARCHAR(255) NOT NULL,
  additional VARCHAR(100) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_rfq)
    REFERENCES rfq(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  FOREIGN KEY(id_user)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE providers(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_item INT NOT NULL,
  provider VARCHAR(100) NOT NULL,
  price  DECIMAL(10,2) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_item)
    REFERENCES items(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE subitems(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_item INT NOT NULL,
  provider_menor INT NOT NULL,
  brand VARCHAR(100) NOT NULL,
  brand_project VARCHAR(100) NOT NULL,
  part_number VARCHAR(100) NOT NULL,
  part_number_project VARCHAR(100) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  description_project TEXT CHARACTER SET utf8 NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  comments TEXT CHARACTER SET utf8 NOT NULL,
  website VARCHAR(255) NOT NULL,
  additional VARCHAR(100) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_item)
    REFERENCES items(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE provider_subitems(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_subitem INT NOT NULL,
  provider VARCHAR(255) NOT NULL,
  price  DECIMAL(10,2) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_subitem)
    REFERENCES subitems(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);
