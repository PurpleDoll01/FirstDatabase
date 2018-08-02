<?php

namespace App\Controllers;

use App\Models\BlogPost;

class IndexController extends BaseController {

    public function getIndex($page = 1){

        $limit = 3;

        $totalReg = BlogPost::all()->count();
        $totalPages = ceil($totalReg / $limit);
        $skip = ($limit * $page ) - $limit;

        $blogPosts = BlogPost::query()->orderBy('id','desc')->skip($skip)->take($limit)->get();

        return $this->render('index.twig', [
        'blogPosts' => $blogPosts,
        'totalPages' => $totalPages,
        'page' => $page
        ]);
    }

    public function getDetail($title) {
        $blogPosts = BlogPost::where('title', $title)->get();
        return $this->render('admin/detail.twig', ['blogPosts' => $blogPosts]);
    }
}