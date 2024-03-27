<?php

setcookie('user_login', '', time() - 3600, "/");
setcookie('user_id', '', time() - 3600, "/");

header('Location: login.php');
exit();
?>
