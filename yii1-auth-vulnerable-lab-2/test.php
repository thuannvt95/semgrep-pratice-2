<?php>
$query = "SELECT * FROM users WHERE id = $_GET[id]";
mysql_query($query);