<?php
define('host', 'mysql');
define('user', 'user');
define('pass', 'userpassword');
define('database', 'mydatabase');

$conexao = mysqli_connect(host, user, pass, database) or die ('Não foi possível conectar');
?>