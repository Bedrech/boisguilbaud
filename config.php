<?php

$host = "localhost";
$db = "boisguilbaud";
$user = "root";
$pass = "";
$port = '3306';
$charset = 'utf8mb4';

// port et charset pas obligatoire

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES=>FALSE
];

try{
    $pdo = new PDO($dsn, $user, $pass);
}
catch(\PDOException $e){
    throw new \PDOException('erreur SQL : ' . $e -> getMessage((int)$e -> getCode()));
}