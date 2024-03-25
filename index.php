<?php
global $mysqli;
require_once 'dbconfig.php';

session_start();
if (empty($_SESSION)) {
    ?>
        <h1>Ты крч не авторизован</h1>
    <a href="login.php">Так что вот лоч</a>
    <?php
}
else {
    $login = $_SESSION['login'];


    $query = "SELECT * FROM users where login = '$login'";
    $res = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <p>
        <h2><?= $row['login']; ?></h2>
        <?= $row['first_name']; ?><br>
        <?= $row['last_name']; ?><br>

        </p>
        <p><a href="logout.php">Logout</a></p>
        <p class='link'>Нажмите сюда, <a href='registration.php'>registration</a> чтобы зарегистрироваться снова</p>
        <?php
    }
}