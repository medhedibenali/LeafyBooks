-- work in progress

CREATE USER 'web_project_user'@'localhost' IDENTIFIED BY 'password';

CREATE DATABASE `web_project_db`;

GRANT INSERT, SELECT, UPDATE, DELETE ON `web_project_db`.* TO `web_project_user`@`localhost`;

CREATE TABLE `web_project_db`.`users` (
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `firstName` VARCHAR(255) NOT NULL,
  `lastName` VARCHAR(255) NOT NULL,
  `birthday` DATE NOT NULL,
  PRIMARY KEY (`username`));
