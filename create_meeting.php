<?php
require('dbconfig.php');

if(isset($_COOKIE['user_login'])) {
    $login = $_COOKIE['user_login'];

    $userQuery = "SELECT id FROM `users` WHERE login = '$login'";
    $res = mysqli_query($mysqli, $userQuery);
    $row = mysqli_fetch_assoc($res);
    $userId = $row['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] == 'Создать встречу') {
        $title = stripslashes($_POST['title']);
        $title = mysqli_real_escape_string($mysqli, $title);
        $description = stripslashes($_POST['description']);
        $description = mysqli_real_escape_string($mysqli, $description);
        $placeWhere = stripslashes($_POST['place_where']);
        $placeWhere = mysqli_real_escape_string($mysqli, $placeWhere);
        $dateWhen = stripslashes($_POST['date_when']);
        $dateWhen = mysqli_real_escape_string($mysqli, $dateWhen);

        $query = "INSERT INTO `meetings` (title, description, created_at, place_where, date_when ) 
                    VALUES ('$title', '$description', CURRENT_TIMESTAMP, '$placeWhere', '$dateWhen')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $meetId = mysqli_insert_id($mysqli);

            $usersMeetingsQuery = "INSERT INTO `users_meetings` (user_id, meeting_id) VALUES ('$userId', '$meetId')";
            $usersMeetingsResult = mysqli_query($mysqli, $usersMeetingsQuery);

            if ($usersMeetingsResult) {
                echo "<p>Встреча успешно создана!</p>";
            } else {
                echo "<p>Ошибка при создании записи в таблице users_meetings: " . mysqli_error($mysqli) . "</p>";
            }
        } else {
            echo "<p>Ошибка при создании встречи: " . mysqli_error($mysqli) . "</p>";
        }
    }
} else {
    echo "<h1>Вы не авторизировались</h1>";
    echo "<a href='login.php'>Войти</a>";
    exit;
}
?>

<form class="form" action="" method="post" name="create_meeting">
    <h1 class="login-title">Создание встречи</h1>
    <input type="text" name="title" placeholder="Заголовок" required />
    <textarea name="description" rows="10" cols="40" placeholder="Описание" required> </textarea>
    <input type="text" name="place_where" placeholder="место встречи"/>
    <input type="datetime-local" name="date_when">


    <input type="submit" name="submit" value="Создать встречу" >
</form>

<?php
$query = "SELECT m.title, m.description, m.created_at, m.place_where, m.date_when
          FROM meetings m
          INNER JOIN users_meetings um ON m.id = um.meeting_id
          WHERE um.user_id = '$userId'";

$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2>Ваши встречи:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Заголовок:</strong> " . $row['title'] . "<br>";
        echo "<strong> Описание:</strong> " . $row['description'] . "<br>";
        echo "<strong> Место встречи:</strong> " . $row['place_where'] . "<br>";
        echo "<strong> Дата встречи:</strong> " . $row['date_when'] . "<br>";
        echo "<strong> Дата  создания: </strong> " . $row['created_at'] . "</p>";
    }
} else {
    echo "<p>Никаких встреч не запланировано.</p>";
}
?>

<a href="index.php">Вернуться на страницу</a>

</body>
</html>
