<?php
$DB_DSN = 'mysql:host=localhost;dbname=project;charset=utf8';
$DB_USER = 'root';
$DB_PASS = '';

$DB_OPTIONS = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    //PDO::ATTR_PERSISTENT => true
];

//echo "test";

try {
    $bdd = new PDO($DB_DSN,$DB_USER,$DB_PASS,$DB_OPTIONS);
    $bdd->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    echo "pouet";
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


?>

