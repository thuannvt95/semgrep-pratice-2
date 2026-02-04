<?php
require_once "db.php";
session_start();

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;

        file_put_contents("log.txt",
            "Login: $username | $password\n",
            FILE_APPEND
        );

        header("Location: dashboard.php");
    } else {
        echo "Login failed";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Username: <input name="username"><br>
    Password: <input name="password" type="password"><br>
    <button>Login</button>
</form>
