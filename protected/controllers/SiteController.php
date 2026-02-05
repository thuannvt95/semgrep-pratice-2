<?php

require_once dirname(__FILE__)."/../components/Controller.php";

class SiteController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }
}
