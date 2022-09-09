<?php

namespace Admin;


use DataBase\DataBase;

class Dashboard extends Admin
{
    
    public function index()
    {
        $db = new DataBase();
        $postCount = $db->select('SELECT COUNT(*) FROM `posts`  ;')->fetch();
        $postsViews = $db->select('SELECT SUM(view) FROM `posts`  ;')->fetch();
        $commentsCount = $db->select('SELECT COUNT(*) FROM `comments`  ;')->fetch();
        $commentsUnseenCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'unseen' ;")->fetch();
        $commentsApprovedCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'approved' ;")->fetch();
        $userCount = $db->select("SELECT COUNT(*) FROM `users` WHERE `permission` = 'user';")->fetch();
        $adminCount = $db->select("SELECT COUNT(*) FROM `users` WHERE `permission` = 'admin' ;")->fetch();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `categories` ;")->fetch();
        $postsWithView = $db->select('SELECT * FROM `posts` ORDER BY `view` DESC LIMIT 0,5 ;');


        $postsComments = $db->select("SELECT `posts`.`id`, `posts`.`title`, COUNT(`comments`.`post_id`) AS 'comment_count' FROM `posts`  LEFT JOIN  `comments`  ON `posts`.`id` = `comments`.`post_id` GROUP BY `posts`.`id` ORDER BY `comment_count` DESC LIMIT 0,5 ;");


        $lastComments = $db->select('SELECT comments.id, comments.comment, comments.status, comments.post_id, users.username FROM comments, users WHERE comments.user_id = users.id order by comments.created_at DESC LIMIT 0,5 ;');


        require_once (BASE_PATH . "/template/admin/dashboard/index.php");
    }
}