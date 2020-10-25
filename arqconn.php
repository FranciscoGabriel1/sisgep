<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 10/10/2018
 * Time: 01:12
 */
//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'semmai48_admin');
define('PASS', 'sisgep@123');
define('DBNAME', 'semmai48_sisgep');
$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);