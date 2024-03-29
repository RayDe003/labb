<?php
require('dbconfig.php');

if(isset($_COOKIE['user_login'])) {
    $login = $_COOKIE['user_login'];

    $userQuery = "SELECT id FROM `users` WHERE login = '$login'";
    $res = mysqli_query($mysqli, $userQuery);
    $row = mysqli_fetch_assoc($res);
    $userId = $row['id'];

    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($mysqli, $_POST['title']);

        if (!empty($title)) {
            $searchQuery = "SELECT m.title, m.description, m.created_at, m.place_where, m.date_when 
                            FROM meetings m 
                            INNER JOIN users_meetings um ON m.id = um.meeting_id 
                            WHERE um.user_id = '$userId' AND m.title LIKE '%$title%';";

            $result = mysqli_query($mysqli, $searchQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h2>Ваши встречи  по поиску:</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p><strong>Заголовок:</strong> " . $row['title'] . "<br>";
                    echo "<strong> Описание:</strong> " . $row['description'] . "<br>";
                    echo "<strong> Место встречи:</strong> " . $row['place_where'] . "<br>";
                    echo "<strong> Дата встречи:</strong> " . $row['date_when'] . "<br>";
                    echo "<strong> Дата  создания: </strong> " . $row['created_at'] . "</p>";
                }
            } else {
                echo "<p>Таких встреч нет.</p>";
            }
        } else {
            echo "<p>Введите поисковый запрос</p>";
        }
    }
?>
<a href="index.php">Вернуться на страницу</a>
<?php
}
?>
