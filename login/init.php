<?php

// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sisgep');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

// inclui o arquivos de funçõees
require_once 'functions.php';