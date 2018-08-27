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
  code VARCHAR(255) NOT NULL,
  link VARCHAR(255) NOT NULL,
  project_name VARCHAR(255) NOT NULL,
  end_date DATETIME,
  priority VARCHAR(255) NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  submission_instructions VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  flowchart_comments TEXT CHARACTER SET utf8 NOT NULL,
  flowchart TINYINT NOT NULL,
  designated_user TINYINT NOT NULL,
  reviewed_project TINYINT NOT NULL,
  priority_color VARCHAR(255) NOT NULL,
  create_part_comments TEXT CHARACTER SET utf8 NOT NULL,
  subject VARCHAR(255) NOT NULL,
  result VARCHAR(255) NOT NULL,
  proposed_price DECIMAL(20,2),
  business_type VARCHAR(255) NOT NULL,
  submitted TINYINT NOT NULL,
  award TINYINT NOT NULL,
  submitted_date DATE,
  award_date DATE,
  quantity_years INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_user)
    REFERENCES users(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE comments(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_project INT NOT NULL,
  id_user INT NOT NULL,
  comment_date DATETIME,
  comment TEXT CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_project)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  FOREIGN KEY(id_user)
    REFERENCES users(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
);

CREATE TABLE services(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_project INT NOT NULL,
  total DECIMAL(20,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_project)
    REFERENCES projects(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE years(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_service INT NOT NULL,
  description TEXT CHARACTER SET utf8 NOT NULL,
  quantity INT NOT NULL,
  amount DECIMAL(20,2),
  year INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_service)
    REFERENCES services(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE costs(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_service INT NOT NULL,
  description VARCHAR(255) NOT NULL,
  amount DECIMAL(20,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_service)
    REFERENCES services(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE staff(
  id INT NOT NULL AUTO_INCREMENT UNIQUE,
  id_service INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  hourly_rate DECIMAL(20,2),
  rate DECIMAL(20,2),
  office_expenses DECIMAL(20,2),
  burdened_rate DECIMAL(20,2),
  fblr DECIMAL(20,2),
  hours_project INT,
  total_burdened_rate DECIMAL(20,2),
  total_fblr DECIMAL(20,2),
  PRIMARY KEY(id),
  FOREIGN KEY(id_service)
    REFERENCES services(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);
