<?php

namespace App\core;
use App\controllers\HomeController;
use App\controllers\UserController;

class Router
{
    public Request $request;
    public Response $response;

    protected $routes = [];

    public function __construct($request, $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback === false) {
            $code = 404;

            $this->response->setStatusCode($code);
            return $this->loadView("errors/_404", compact('code'));
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }


    public function renderView($view, $params = []) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        $layout = $this->loadLayout($view, $params);
        
        $view = $this->loadView($view, $params);

        $header = $this->loadHeader();
     
        $layout=str_replace("{{content}}", $view, $layout);

        return str_replace("{{header}}", $header, $layout);
    }

    protected function loadView($view, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/App/view/$view.php";
        return ob_get_clean();
    }

    protected function loadLayout($view, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        
        ob_start();
        include_once Application::$ROOT_DIR . "/App/view/layouts/main.php";
        return ob_get_clean();
    }

    protected function loadHeader() {

        ob_start();
        include_once Application::$ROOT_DIR . "/app/view/layouts/header.php";
        return ob_get_clean();
    }

}