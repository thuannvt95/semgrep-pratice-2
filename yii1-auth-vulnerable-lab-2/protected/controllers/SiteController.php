<?php
require_once dirname(__FILE__)."/../components/Controller.php";
require_once dirname(__FILE__)."/../models/User.php";

class SiteController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionRegister() {
        if($_POST) {
            $u=$_POST['username'];
            $p=$_POST['password'];

            User::save($u,$p);
            echo "Register success";
        }
        $this->render('register');
    }

    public function actionLogin() {
        if($_POST) {
            $u=$_POST['username'];
            $p=$_POST['password'];

            if(User::login($u,$p)) {
                file_put_contents("protected/runtime/auth.log","$u|$p\n",FILE_APPEND);
                $this->redirect('site/dashboard');
            } else {
                echo "Login failed";
            }
        }
        $this->render('login');
    }

    public function actionDashboard() {
        $this->render('dashboard');
    }
}
