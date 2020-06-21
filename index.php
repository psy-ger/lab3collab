<?php
@session_start();
require_once 'connect.php';
// Массив доступных для выбора языков
$LangArray = array("ru", "ua", "en");
// Язык по умолчанию
$DefaultLang = "ru";

// Если язык уже выбран и сохранен в сессии отправляем его скрипту
if(@$_SESSION['NowLang']) {
    // Проверяем если выбранный язык доступен для выбора
    if(!in_array($_SESSION['NowLang'], $LangArray)) {
        // Неправильный выбор, возвращаем язык по умолчанию
        $_SESSION['NowLang'] = $DefaultLang;
    }
}
else {
    $_SESSION['NowLang'] = $DefaultLang;
}

// Выбранный язык отправлен скрипту через GET
$language = addslashes($_GET['lang']);
if($language) {
    // Проверяем если выбранный язык доступен для выбора
    if(!in_array($language, $LangArray)) {
        // Неправильный выбор, возвращаем язык по умолчанию
        $_SESSION['NowLang'] = $DefaultLang;
    }
    else {
        // Сохраняем язык в сессии
        $_SESSION['NowLang'] = $language;
    }
}

// Открываем текущий язык
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $Lang['title']?></title>
</head>
<body>

    <form action="login.php" method="post" enctype="multipart/form-data">
        <label><? echo $Lang['login_lan']?></label>
        <input type="text" name="login">
        <label><? echo $Lang['pass_lan']?></label>
        <input type="password" name="password">
        <button type="submit"><? echo $Lang['button_lan']?></button><a href="index.php?lang=ru"><img src="img/ru.png"></a>
        <a href="index.php?lang=ua"><img src="img/ua.png"></a>
        <a href="index.php?lang=en"><img src="img/en.png"></a>

        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div>' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
    </form>
</body>
</html>