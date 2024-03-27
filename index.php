<?php
require_once 'dbconfig.php';

if (!isset($_COOKIE['user_login']) || !isset($_COOKIE['user_id'])) {
    ?>
    <h1>Вы не авторизировались</h1>
    <a href="login.php">Войти</a>
    <p class='link'>Нажмите сюда, <a href='registration.php'>чтобы зарегистрироваться</a></p>
    <?php
}
else {
    $login = $_COOKIE['user_login'];

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
        <p> <a href="timetable.php"> Ваше расписание</a> </p>
        <p><a href="logout.php">Выйти</a></p>
        <?php
    }
}
