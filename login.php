<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
<?php
require('dbconfig.php');
if (isset($_POST['login'])) {
    $login = stripslashes($_REQUEST['login']);
    $login = mysqli_real_escape_string($mysqli, $login);
    $query    = "SELECT * FROM `users` WHERE login='$login'" ;
    $result = mysqli_query($mysqli, $query) or die(mysqli_connect_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $user = mysqli_fetch_assoc($result);
        $userId = $user['id'];
        setcookie('user_login', $login, time() + (86400 * 30), "/");
        setcookie('user_id', $userId, time() + (86400 * 30), "/");
        header('Location: index.php');
    } else {
        echo "<div class='form'>
                  <h3>Нет лол.</h3><br/>
                  <p class='link'>Нажми сюда <a href='login.php'>Login</a> опять.</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Авториазация</h1>
        <input type="text"  name="login" placeholder="login" autofocus="true"/>
        <input type="submit" value="Login" name="submit"/>
        <p class="link"><a href="registration.php">Регистрация</a></p>
    </form>
    <?php
}
?>
</body>
</html>
