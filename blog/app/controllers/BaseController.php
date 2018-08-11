<?php

namespace App\Controllers;

use Twig_Loader_Filesystem;

class BaseController {

    protected $templateEngine;

    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../views'); //aqui estamos poniendo el path de las vistas como si estuvieramos parados en el index de public que es el que envía al controlador
        $this->templateEngine = new \Twig_Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);

        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url', function($path) {
            return BASE_URL . $path;
        }));
    }

    public function render($fileName, $data = []) {
        return $this->templateEngine->render($fileName, $data);
    }
}