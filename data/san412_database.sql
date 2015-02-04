CREATE DATABASE IF NOT EXISTS san412_database;
USE san412_database;
--table for Administrator
DROP TABLE IF EXISTS san412_admin;
CREATE TABLE san412_admin(
id tinyint unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
email varchar(50) not null
);

--table for user
DROP TABLE IF EXISTS san412_user;
CREATE TABLE san412_user(
id int unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
sex enum("man","woman","unknow") not null default "unknow",
face varchar(50) not null,
regTime int unsigned not null
);

--table for photo
DROP TABLE IF EXISTS san412_picture;
CREATE TABLE san412_picture(
id int unsigned auto_increment key,
pid int unsigned not null,
albumPath varchar(50) not null
);

--table for passage
DROP TABLE IF EXISTS san412_passage;
CREATE TABLE san412_passage(
id int unsigned auto_increment key,
pid int unsigned not null,
albumPath varchar(50) not null,
filePath varchar(50) not null
);










