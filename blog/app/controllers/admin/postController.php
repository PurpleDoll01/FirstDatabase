<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController {

    public function getIndex() {
        $blogPosts = BlogPost::all();
        return $this->render('admin/posts.twig', ['blogPosts' => $blogPosts]);
    }

    public function getCreate() {
        return $this->render('admin/insert-post.twig');
    }

    public function postCreate() {
        $errors = [];
        $result = false;
        $errors1;


        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');

        if ($validator->validate($_POST)) {
            $blogPost = new blogPost([
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);
            $blogPost->save();
            $result = true;
        } else {
            //$errors = $validator->getMessages();
            $validator->clearMessages();
            $errors1 = $validator->addMessage('Title', 'This field is required');
            $errors2 = $validator->addMessage('Content', 'This field is required');
            $errors = $validator->getMessages();
            //Aqui modificamos codifo del curso para poder mostrar title y content con cap
        }

        return $this->render('admin/insert-post.twig', [
            'result' => $result,
            'errors' => $errors
        ]);
    }
}

