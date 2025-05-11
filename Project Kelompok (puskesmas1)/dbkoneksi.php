<?php
$host = 'localhost';
$dbname = 'dbpuskesmas3';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

$dbh = new PDO($dsn, $username, $password)

?>