<?php

namespace App\Controllers;

use App\Models\BlogPost;
use App\Models\User;

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
        'page' => $page,
        ]);

    }

    public function getDetail($id) {
        $blogPosts = BlogPost::where('id', $id)->get();
        return $this->render('admin/detail.twig', ['blogPosts' => $blogPosts]);
    }
}