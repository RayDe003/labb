<?php
require('dbconfig.php');

// Получаем логин пользователя из куки
if(isset($_COOKIE['user_login'])) {
    $login = $_COOKIE['user_login'];

    $query = "SELECT id FROM `users` WHERE login = '$login'";
    $res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($res);
    $userId = $row['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] == 'Создать заметку') {
        $title = stripslashes($_POST['title']);
        $title = mysqli_real_escape_string($mysqli, $title);
        $description = stripslashes($_POST['description']);
        $description = mysqli_real_escape_string($mysqli, $description);

        $query = "INSERT INTO `notes` (title, description, created_at) VALUES ('$title', '$description', CURRENT_TIMESTAMP)";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $noteId = mysqli_insert_id($mysqli);

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
} else {
    echo "<h1>Вы не авторизировались</h1>";
    echo "<a href='login.php'>Войти</a>";
    exit;
}
?>

<form class="form" action="" method="post" name="create_note">
    <h1 class="login-title">Создание заметки</h1>
    <input type="text" name="title" placeholder="title" required />
    <textarea name="description" rows="10" cols="40" placeholder="Описание" required> </textarea>
    <input type="submit" name="submit" value="Создать заметку" >
</form>

<?php
$query = "SELECT n.title, n.description, n.created_at
          FROM notes n
          INNER JOIN users_notes un ON n.id = un.note_id
          WHERE un.user_id = '$userId'";

$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2>Ваши заметки:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Заголовок:</strong> " . $row['title'] . "<br>";
        echo "<strong> Описание:</strong> " . $row['description'] . "<br>";
        echo "<strong> Дата  создания: </strong> " . $row['created_at'] . "</p>";
    }
} else {
    echo "<p>У вас пока нет заметок.</p>";
}
?>

<a href="index.php">Вернуться на страницу</a>
