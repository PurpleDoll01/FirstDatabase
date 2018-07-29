<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PostController extends BaseController {

    public function getIndex() {
        global $pdo;

        //admin/posts or admin/posts/index
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('admin/posts.twig', ['blogPosts' => $blogPosts]);
    }

    public function getCreate() {
        //admin/posts/create
        return $this->render('admin/insert-post.twig');
    }

    public function postCreate() {
        global $pdo;

        //admin/posts/create

        $sql = 'INSERT INTO blog_posts (title,content) VALUES (:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        //  header("refresh: 2; url=insert-post.php");

        return $this->render('admin/insert-post.twig', ['result' => $result]);
    }
}

