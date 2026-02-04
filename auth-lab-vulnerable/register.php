<?php
require_once "db.php";

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username, password)
            VALUES('$username', '$password')";

    if ($conn->query($sql)) {
        echo "Register success!";
    } else {
        echo "Error!";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    Username: <input name="username"><br>
    Password: <input name="password" type="password"><br>
    <button>Register</button>
</form>
