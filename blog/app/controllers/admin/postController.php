<?php

namespace App\Controllers\Admin;

class PostController {

    public function getIndex() {
        global $pdo;

        //admin/posts or admin/posts/index
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return render('../views/admin/posts.php', ['blogPosts' => $blogPosts]);
    }

    public function getCreate() {
        //admin/posts/create
        return render('../views/admin/insert-post.php');
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

        return render('../views/admin/insert-post.php', ['result' => $result]);
    }
}

