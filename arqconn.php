<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 10/10/2018
 * Time: 01:12
 */
//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'sisgep');
$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);