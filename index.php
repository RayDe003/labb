<?php
global $mysqli;
require_once 'dbconfig.php';

session_start();
$login = $_SESSION['login'];

$query = "SELECT * FROM users where login = '$login'";
$res = mysqli_query($mysqli, $query);
//if (!$res) die (mysqli_error($mysqli));

//var_dump($res);
//var_dump(is_null(mysqli_fetch_all($res)));
while ($row = mysqli_fetch_assoc($res)) {
?>
<p>
<h2><?= $row['login']; ?></h2>
    <?= $row['first_name']; ?><br>
    <?= $row['last_name']; ?><br>

</p>

    <p class='link'>Нажмите сюда, <a href='registration.php'>registration</a> чтобы  зарегистрироваться снова</p>
    <?php
    }