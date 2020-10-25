<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 10/10/2018
 * Time: 01:12
 */
//Credenciais de acesso ao BD
/*define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'sisgep');
$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);*/

define('HOST', '108.179.193.168');
define('USER', 'conhe913_sisgep');
define('PASS', 'sisgep@123');
define('DBNAME', 'conhe913_sisgep');
$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
?>