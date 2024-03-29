<?php
require('dbconfig.php');

if(isset($_COOKIE['user_login'])) {
    $login = $_COOKIE['user_login'];
    $userQuery = "SELECT id FROM `users` WHERE login = '$login'";
    $res = mysqli_query($mysqli, $userQuery);
    $row = mysqli_fetch_assoc($res);
    $userId = $row['id'];

    $timetableQuery = "SELECT mt.*, m.title, m.description, DATE(m.date_when) AS date_without_time, m.place_where, t.name_day_of_week, m.date_when
                      FROM meetings_in_timetable mt
                      INNER JOIN users_meetings um ON mt.meeting_id = um.meeting_id
                      INNER JOIN meetings m ON mt.meeting_id = m.id
                      INNER JOIN timetable t ON mt.day_id = t.id
                      WHERE um.user_id = '$userId'
                      ORDER BY m.date_when";
    $timetableResult = mysqli_query($mysqli, $timetableQuery);

    if ($timetableResult && mysqli_num_rows($timetableResult) > 0) {
        echo "<h2>Ваше расписание:</h2>";
        echo "<p> <a href='create_meeting.php'> Создать встречу</a> </p>";

        $prevDateWithoutTime = null;

        while ($row = mysqli_fetch_assoc($timetableResult)) {
            $meetingTitle = $row['title'];
            $meetingDescription = $row['description'];
            $meetingPlace = $row['place_where'];
            $dateWithoutTime = $row['date_without_time'];
            $dayName = $row['name_day_of_week'];
            $dateWhen = $row['date_when'];

            if ($dateWithoutTime !== $prevDateWithoutTime) {
                echo "<h3>$dayName, $dateWithoutTime</h3>";
                $prevDateWithoutTime = $dateWithoutTime;
            }

            echo "<p><strong>Встреча:</strong> $meetingTitle</p>";
            echo "<p><strong>Описание:</strong> $meetingDescription</p>";
            echo "<p><strong>Место встречи: </strong> $meetingPlace <br> ";
            echo "<p><strong>Дата встречи:</strong> $dateWhen</p> <br>";
        }

    } else {
        echo "<p>У вас нет запланированных встреч на этой неделе.</p>";
    }
    ?>
    <a href="index.php">Вернуться на страницу</a>
    <?php
} else {
    echo "<h1>Вы не авторизировались</h1>";
    echo "<a href='login.php'>Войти</a>";
    exit;
}
?>

