<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;
use App\Log;

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
            $blogPost = new BlogPost([
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);
            if ($_POST['img_url']) {
               $blogPost->img_url = $_POST['img_url'];
            }

            $blogPost->save();
            $result = true;
        } else {
            //$errors = $validator->getMessages();
            $errors = $validator->getMessages();
            Log::logError('Error creating post: ' . serialize($errors));
            //Aqui modificamos codifo del curso para poder mostrar title y content con cap
        }

        return $this->render('admin/insert-post.twig', [
            'result' => $result,
            'errors' => $errors
        ]);
    }

    public function getEdit($id) {
        $blogPosts = BlogPost::select('title', 'img_url', 'content')->where('id', $id)->get();
        return $this->render('admin/edit-post.twig', [
            'blogPosts' => $blogPosts,
        ]);
    }

    public function postEdit($id) {
        $errors = [];
        $result = false;

        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');

        if ($validator->validate($_POST)) {

            $postTitle = $_POST['title'];
            $postContent = $_POST['content'];

            if ($_POST['img_url']) {
                $postImage = $_POST['img_url'];
            }

            $blogPosts = BlogPost::where('id', $id)->update(['title' => $postTitle, 'img_url' => $postImage, 'content' => $postContent]);
            $result = true;
        } else {
            //$errors = $validator->getMessages();
            $errors = $validator->getMessages();
            Log::logError('Error editing post: ' . serialize($errors));
            //Aqui modificamos codifo del curso para poder mostrar title y content con cap
        }

        return $this->render('admin/edit-post.twig', [
            'blogPosts' => $blogPosts,
            'result' => $result,
            'errors' => $errors
        ]);
    }

    public function getDelete($id){
        $blogPosts = BlogPost::where('id', $id)->delete();
        return $this->render('admin/delete-post.twig', ['blogPosts'=> $blogPosts]);
    }
}

