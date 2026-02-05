<?php
class User {

    private static function db() {
        return new mysqli("localhost","root","","auth_lab");
    }

    // ❌ SQL Injection
    public static function search($keyword) {

       $db = self::db();
       $query = "SELECT * FROM users WHERE id = " . $keyword;

        $result = $db->query($sql);

        $data = [];

        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
