--MYSQL
-- create database
CREATE DATABASE rhythmHouseMannagement;

-- active this database
USE rhythmHouseMannagement;

-- create tables:
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100),
  thumnail_link vARCHAR(200),
  artist VARCHAR(150),
  performance VARCHAR(150),
  music_type VARCHAR(150),
  release_year INT,
  created_at DATETIME,
  updated_at DATETIME
);

CREATE TABLE products_detail (
  id_products INT,
  id_categoriese INT,
  number INT,
  price DECIMAL(15, 2),
  description LONGTEXT,
  created_at DATETIME,
  updated_at DATETIME
);
