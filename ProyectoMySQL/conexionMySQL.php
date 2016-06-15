<?php #conexionMySQL.php - Archivo con datos de conexión hacia base de datos MySQL.

define ('DB_HOST_MySQL', 'localhost');
define ('DB_NAME_MySQL', 'bd_arduino');
define ('DB_USER_MySQL', 'root');
define ('DB_PASS_MySQL', '');

$conexion = new MySQLi(DB_HOST_MySQL, DB_USER_MySQL, DB_PASS_MySQL);
$conexion->set_charset('utf8');


