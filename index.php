<?php
global $mysqli;
require_once 'dbconfig.php';

$login = $_POST['login'];

$query = "SELECT * FROM users where login = '$login'";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));

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
