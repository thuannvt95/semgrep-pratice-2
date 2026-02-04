<?php
class Controller {
    protected function render($view) {
        include dirname(__FILE__)."/../views/site/$view.php";
    }
    protected function redirect($url) {
        header("Location: index.php?r=".$url);
    }
}
