<?php
class YiiBase {
    public static function createWebApplication($config) {
        require $config;
        return new Application();
    }
}

class Application {

    public function run() {

        require 'protected/controllers/SiteController.php';

        $route = $_GET['r'] ?? 'site/index';

        list($c, $a) = explode('/', $route);

        $controller = new SiteController();
        $method = 'action' . ucfirst($a);

        if(method_exists($controller, $method)) {
            $controller->$method();
        } else {
            echo "Action not found";
        }
    }
}
