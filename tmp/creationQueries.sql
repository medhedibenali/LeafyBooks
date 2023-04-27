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

--readact table--
CREATE TABLE `readact`
(
    `username`    varchar(255) NOT NULL,
    `isbn`        varchar(255) NOT NULL,
    `status`      varchar(255) NOT NULL,
    `start_date`  date         NOT NULL,
    `finish_date` date         NOT NULL,
    PRIMARY KEY (`username`, `isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

--user_reviews table--
CREATE TABLE `user_reviews`
(
    `isbn`     varchar(255)   NOT NULL,
    `username` varchar(255)   NOT NULL,
    `review`   varchar(10000) NOT NULL,
    `rating`   float          NOT NULL,
    PRIMARY KEY (`isbn`, `username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
--books table--
CREATE TABLE `books`
(
    `isbn`      varchar(255)   NOT NULL,
    `title`     varchar(255)   NOT NULL,
    `author`    varchar(255)   NOT NULL,
    `publisher` varchar(255)   NOT NULL,
    `picture`   varchar(10000) NOT NULL,
    `synopsis`  mediumtext     NOT NULL,
    `publishing_year` year(4) NOT NULL,
    `rating`    float          NOT NULL,
    `genre`     varchar(255)   NOT NULL,
    PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

--users--
CREATE TABLE `users`
(
    `username`   varchar(255)   NOT NULL,
    `password`   varchar(255)   NOT NULL,
    `first_name` varchar(255)   NOT NULL,
    `last_name`  varchar(255)   NOT NULL,
    `picture`    varchar(10000) NOT NULL,
    `birthday`   date DEFAULT NULL,
    PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


