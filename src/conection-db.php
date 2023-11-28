<?php

$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];

$pdo = new PDO("mysql:host=localhost;dbname=restaurante-php",'root','Abc12345!');
