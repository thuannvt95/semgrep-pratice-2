<?php
class User {

    public static function db() {
        return new mysqli("localhost","root","root123","auth_lab");
    }

    public static function save($u,$p) {
        $db=self::db();
        $db->query("INSERT INTO users(username,password) VALUES('$u','$p')");
    }

    public static function login($u,$p) {
        $db=self::db();
        $r=$db->query("SELECT * FROM users WHERE username='$u' AND password='$p'");
        return $r->num_rows>0;
    }
}
