<?php
require('dbconfig.php');

if(isset($_COOKIE['user_login'])) {
    $login = $_COOKIE['user_login'];
    $userQuery = "SELECT id FROM `users` WHERE login = '$login'";
    $res = mysqli_query($mysqli, $userQuery);
    $row = mysqli_fetch_assoc($res);
    $userId = $row['id'];


    $timetableQuery = "SELECT mt.*, m.title, m.description, m.date_when, m.place_where FROM meetings_in_timetable mt
                      INNER JOIN users_meetings um ON mt.meeting_id = um.meeting_id
                      INNER JOIN meetings m ON mt.meeting_id = m.id
                      WHERE um.user_id = '$userId'
                      ";
    $timetableResult = mysqli_query($mysqli, $timetableQuery);

    if ($timetableResult && mysqli_num_rows($timetableResult) > 0) {
        echo "<h2>Ваше расписание на неделю:</h2>";
        while ($row = mysqli_fetch_assoc($timetableResult)) {
            $meetingTitle = $row['title'];
            $meetingDescription = $row['description'];
            $meetingPlace = $row['place_where'];
            $dayOfWeek = $row['date_when'];
            $dayNameQuery = "SELECT DAYOFWEEK (date_when)-1, t.name_day_of_week FROM meetings m
                            INNER JOIN meetings_in_timetable mit ON mit.meeting_id = m.id
                            INNER JOIN timetable t ON t.id = mit.day_id";
            $dayName = mysqli_query($mysqli, $dayNameQuery);
            $row = mysqli_fetch_assoc($dayName);
            $aaa = $row['name_day_of_week'];
            echo "<h3>$aaa</h3>";
            echo "<p><strong>Встреча:</strong> $meetingTitle</p>";
            echo "<p><strong>Описание:</strong> $meetingDescription</p>";
            echo "<p><strong>Дата встречи:</strong> $dayOfWeek</p> <br>";

        }
    } else {
        echo "<p>У вас нет запланированных встреч на этой неделе.</p>";
    }

    ?>
    <a href = "index.php" > Вернуться на страницу </a >
<?php
    }
else {
    echo "<h1>Вы не авторизировались</h1>";
    echo "<a href='login.php'>Войти</a>";
    exit;
}
?>
</body>
</html>
