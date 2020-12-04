-- MYSQL
-- create database
CREATE DATABASE rhythmHouseMannagement;

-- active this database
USE rhythmHouseMannagement;

-- create tables:
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL UNIQUE,
  isDeleted INT DEFAULT 0  -- 0: not deleted, 1: deleted
);

CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_categories INT,
  name VARCHAR(200),
  number INT,
  price DECIMAL(15, 2),
  thumnail_link vARCHAR(200),
  author VARCHAR(150),
  performance VARCHAR(150),
  music_type VARCHAR(150),
  desciption LONGTEXT,
  release_year INT,
  created_at DATETIME,
  updated_at DATETIME,
  isDeleted INT DEFAULT 0, -- 0: not deleted, 1: deleted
  CONSTRAINT FK_id_categories FOREIGN KEY (id_categories) REFERENCES categories(id)
);

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(150),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(20),
  phone VARCHAR(20),
  address VARCHAR(300),
  role INT DEFAULT 0
);

CREATE TABLE orders (
	id INT PRIMARY KEY AUTO_INCREMENT,
  id_Users INT,
  created_at DATETIME,
  name VARCHAR(150),
  phone VARCHAR(20),
  address VARCHAR(300),
  payment VARCHAR(50),
  total_money	DECIMAL(15,2),
  note LONGTEXT,
  status INT DEFAULT 0, -- -1 false, 0: pending, 1: success
  CONSTRAINT FK_id_Users FOREIGN KEY (id_Users) REFERENCES users(id)
);



CREATE TABLE orders_detail (
	id_Orders INT,
  id_Products INT,
  price DECIMAL(15,2),
  number INT,
  total_money DECIMAL(15,2),
  CONSTRAINT PK_orders_detail PRIMARY KEY (id_Orders, id_Products),
  CONSTRAINT FK_id_Orders FOREIGN KEY (id_Orders) REFERENCES orders(id),
  CONSTRAINT FK_id_Products FOREIGN KEY (id_Products) REFERENCES products(id)
);	



-- ===============
-- add admin 
INSERT INTO users (name, email, password, role) VALUES ('admin', 'admin@gmail.com', '12345678a', 1);


-- categories
INSERT INTO categories(name) VALUES ('CDs'), ('DVDs'), ('Tapes'), ('Magazines'), ('Books');

-- orders
INSERT INTO orders (id_Users, name, phone, address, payment, total_money, note, status) 
VALUES (1, 'Test', '+84989751800', 'Cau Giay, Hanoi', 'COD', 80, null,  0);
-- orders detail

INSERT INTO orders_detail (id_Orders, id_Products, price, number, total_money) 
VALUES (1, 6, 35, 1, 35);
INSERT INTO orders_detail (id_Orders, id_Products, price, number, total_money) 
VALUES (1, 37, 15, 1, 15);