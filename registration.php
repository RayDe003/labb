<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>
<?php
require('dbconfig.php');
if (isset($_REQUEST['login'])) {
    $login = stripslashes($_REQUEST['login']);
    $login = mysqli_real_escape_string($mysqli, $login);
    $firstName = stripslashes($_REQUEST['first_name']);
    $firstName = mysqli_real_escape_string($mysqli, $firstName);
    $lastName = stripslashes($_REQUEST['last_name']);
    $lastName = mysqli_real_escape_string($mysqli, $lastName);

    $query    = "INSERT into `users` (login, first_name, last_name) 
                    VALUES ('$login', '$firstName', '$lastName')";
    $result   = mysqli_query($mysqli, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Вы зарегестрированы</h3><br/>
                  <p class='link'>Нажмите сюда <a href='login.php'>Войти</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Все поля обязательны  для заполнения</h3><br/>
                  <p class='link'>Нажмите сюда, <a href='registration.php'>registration</a> чтобы  зарегистрироваться снова</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Регистрация</h1>
        <input type="text" name="login" placeholder="login" required />
        <input type="text"  name="first_name" placeholder="firstName" required>
        <input type="text"  name="last_name" placeholder="lastName" required>
        <input type="submit" name="submit" value="Register" class="login-button" >
        <p class="link"><a href="login.php"> Есть аккаунт?</a></p>
    </form>
    <?php
}
?>
</body>
</html>
