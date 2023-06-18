<?php



$dsn = 'mysql:host=' . $_ENV['DB_HOST'] .';port='. $_ENV['DB_PORT'] .';dbname='. $_ENV['DB_NAME'] .';charset=utf8mb4';
$opt = array(
 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$pdo = new PDO($dsn,$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD'], $opt);