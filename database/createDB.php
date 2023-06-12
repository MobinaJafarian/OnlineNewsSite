<?php

use Database\DataBase;

class CreateDB extends DataBase
{

    private $queries = [
        "CREATE TABLE `categories` (
                        `id` int(11) NOT NULL AUTO_INCREMENT ,
                        `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `users` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
                        `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
                        `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
                        `permission` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `email` (`email`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `articles` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
                        `summary` text COLLATE utf8_persian_ci NOT NULL,
                        `body` text COLLATE utf8_persian_ci NOT NULL,
                        `view` int(11) NOT NULL DEFAULT '0',
                        `user_id` int(11)  NOT NULL,
                        `cat_id` int(11)  NOT NULL,
                        `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
                        `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `comments` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `user_id` int(11) NOT NULL,
                        `comment` text COLLATE utf8_persian_ci NOT NULL,
                        `article_id` int(11)  NOT NULL,
                        `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `websetting` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` text COLLATE utf8_persian_ci DEFAULT NULL,
                        `description` text COLLATE utf8_persian_ci DEFAULT NULL,
                        `keywords` text COLLATE utf8_persian_ci DEFAULT NULL,
                        `logo` text COLLATE utf8_persian_ci DEFAULT NULL,
                        `icon` text COLLATE utf8_persian_ci DEFAULT NULL,
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
                      ",

        "CREATE TABLE `menus` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
                        `url` varchar(300) COLLATE utf8_persian_ci NOT NULL,
                        `parent_id` int(11) DEFAULT NULL,
                        `created_at` datetime NOT NULL,
                        `updated_at` datetime DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
                      ",
    ];

    public function run()
    {
        foreach ($this->queries as $query) {
            $this->createTable($query);
        }
    }

}
