<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>loh</title>
</head>
<body>

<?php
global $mysqli;
require('dbconfig.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = stripslashes($_POST['title']);
    $title = mysqli_real_escape_string($mysqli, $title);
    $description = stripslashes($_POST['description']);
    $description = mysqli_real_escape_string($mysqli, $description);

    // Вставляем заметку в таблицу notes
    $query = "INSERT INTO `notes` (title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Получаем note_id только что созданной заметки
        $noteId = mysqli_insert_id($mysqli);

        // Получаем user_id на основе данных сессии
        $login = $_SESSION['login'];
        $userQuery = "SELECT id FROM `users` WHERE login = '$login'";
        $res = mysqli_query($mysqli, $userQuery);
        $row = mysqli_fetch_assoc($res);
        $userId = $row['id'];

        // Вставляем запись в таблицу users_notes
        $usersNotesQuery = "INSERT INTO `users_notes` (user_id, note_id) VALUES ('$userId', '$noteId')";
        $usersNotesResult = mysqli_query($mysqli, $usersNotesQuery);

        if ($usersNotesResult) {
            echo "<p>Заметка успешно создана!</p>";
        } else {
            echo "<p>Ошибка при создании записи в таблице users_notes: " . mysqli_error($mysqli) . "</p>";
        }
    } else {
        echo "<p>Ошибка при создании заметки: " . mysqli_error($mysqli) . "</p>";
    }
}
?>

<form class="form" action="" method="post" name="create_note">
    <h1 class="login-title">Создание заметки</h1>
    <input type="text" name="title" placeholder="title" required />
    <input type="text"  name="description" placeholder="description" required>
    <input type="submit" name="submit" value="Создать заметку" class="login-button" >
</form>

</body>
</html>
