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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title><?php echo $Lang['title']?></title>
</head>
<body>
<form action="login.php" method="post" enctype="multipart/form-data">
    <form>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1"><label></label><? echo $Lang['login_lan']?></label></label>
                <input type="text" name="login" class="form-control" >  
            </div>
            <div class="form-group">
    <label for="exampleInputPassword1"><label><? echo $Lang['pass_lan']?></label></label>
    <input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-primary"><? echo $Lang['button_lan']?></button>
<?php
if (isset($_SESSION['msg'])) {
    echo '<div>' . $_SESSION['msg'] . '</div>';
    unset($_SESSION['msg']);
}
?>
<center>
    <a href="index.php?lang=ru"><img src="img/ru.png" width="20"height="15"></a>
    <a href="index.php?lang=ua"><img src="img/ua.png" width="20"height="15"></a>
    <a href="index.php?lang=en"><img src="img/en.png" width="20"height="15"></a>
</center>
</form>
</body>
