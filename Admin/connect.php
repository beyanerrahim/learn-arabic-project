<?php
$dsn = 'mysql:host=localhost;dbname=arabic';
$user = 'root';
$pass = '';
$option = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
];

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'You Are Connected Wellcomw To Database';
} catch (PDOException $e) {
    echo 'Faild To Connect' . $e->getMessage();
}