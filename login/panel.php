<?php
session_start();

require_once 'init.php';
require 'check.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>SEMMA TESTE</title>
</head>

<body>

<h1>Painel do Usuário</h1>

<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>

<?php

if($_SESSION['user_id']==1) {
    echo "<input type='text' name='1' placeholder='digite usuario 1'/>";
}

if($_SESSION['user_id']==2) {
    echo "<input type='text' name='1' placeholder='digite usuario 2'/>";
}

?>
</body>
</html>