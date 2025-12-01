<?php
$dsn = "mysql:host=localhost;dbname=buku;charset=utf8";
$user = "root";
$pass = "Putuagungwira";

$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
