<?php

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionRegister()
    {
        if(isset($_POST['username']))
        {
            $user = new User();
            $user->username = $_POST['username'];
            $user->password = $_POST['password']; // ❌ Plaintext

            if($user->save())
                echo "Register success";
        }

        $this->render('register');
    }

    public function actionLogin()
    {
        if(isset($_POST['username']))
        {
            $u = $_POST['username'];
            $p = $_POST['password'];

            // ❌ Plaintext compare
            $user = User::model()->find(
                "username='$u' AND password='$p'"
            );

            if($user)
            {
                Yii::app()->session['user']=$u;

                // ❌ Log password
                file_put_contents(
                    Yii::app()->basePath.'/runtime/auth.log',
                    "$u | $p\n",
                    FILE_APPEND
                );

                $this->redirect(array('site/dashboard'));
            }
            else
            {
                echo "Login failed";
            }
        }

        $this->render('login');
    }

    public function actionDashboard()
    {
        if(!isset(Yii::app()->session['user']))
            $this->redirect(array('site/login'));

        $this->render('dashboard');
    }
}
