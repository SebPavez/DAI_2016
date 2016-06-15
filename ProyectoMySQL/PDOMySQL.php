<?php

ob_start();
session_start();

define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'bd_arduino');

$db = new PDO("mysql:host=".DB_HOST.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//seteo de hora 
//date_default_timezone_set('');
        