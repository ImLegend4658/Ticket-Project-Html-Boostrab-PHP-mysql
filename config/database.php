<?php
$connection = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'tickts'
];
$mysqli = new mysqli(
    $connection['host'],
    $connection['user'],
    $connection['password'],
    $connection['database']
);

if($mysqli->connect_error){
    die("Error conncting the DATABASE". $mysqli->connect_error);
}