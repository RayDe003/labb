<?php
require_once 'dbconfig.php';

session_start();
if (empty($_SESSION)) {
    ?>
        <h1>Вы не авторизировались</h1>
    <a href="login.php">гг вп</a>
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

        <p> <a href="create_note.php"> Ваши заметки</a> </p>
        <p> <a href="create_meeting.php"> Ваши встречи</a> </p>
        <p><a href="logout.php">Выйти</a></p>
        <p class='link'>Нажмите сюда, <a href='registration.php'>чтобы зарегистрироваться снова</a></p>
        <?php
    }
}