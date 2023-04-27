-- work in progress

CREATE
USER 'web_project_user'@'localhost' IDENTIFIED BY 'password';

CREATE
DATABASE `web_project_db`;

GRANT INSERT, SELECT, UPDATE, DELETE ON `web_project_db`.* TO `web_project_user`@`localhost`;

CREATE TABLE `web_project_db`.`users`
(
    `username`   VARCHAR(255) NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name`  VARCHAR(255) NOT NULL,
    `birthday`   DATE         NOT NULL,
    PRIMARY KEY (`username`)
);

--author table--
CREATE TABLE `authors`
(
    `id`          varchar(255) NOT NULL,
    `pen_name`    varchar(255) NOT NULL,
    `first_name`  varchar(255) NOT NULL,
    `last_name`   varchar(255) NOT NULL,
    `birthday`    date         NOT NULL,
    `deathday`    date         NOT NULL,
    `bio`         mediumtext   NOT NULL,
    `nationality` varchar(255) NOT NULL,
    `picture`     mediumtext   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
