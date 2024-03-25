<?php
$host = 'localhost';
$database = 'labb';
$user = 'root';
$password = '';

$mysqli = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}
