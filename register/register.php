<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");


?>

<html>
<body>

<form action="singup.php" method="post" enctype="multipart/form-data">
    <label><? echo $Lang['name']?></label><br>
    <input type="text" name="name"><br>

    <label><? echo $Lang['surname']?></label><br>
    <input type="text" name="surname"><br>

    <label><? echo $Lang['login_lan']?></label><br>
    <input type="text" name="login"><br>

    <label><? echo $Lang['pass_lan']?></label><br>
    <input type="password" name="password"><br>

    <label><? echo $Lang['pass_conf']?></label><br>
    <input type="password" name="password_confirm"><br>

    <button type="submit"><? echo $Lang['button_lan']?></button>
</form>
</body>
</html>
