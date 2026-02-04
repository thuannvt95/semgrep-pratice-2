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
        $c = new SiteController();
        $c->actionIndex();
    }
}
