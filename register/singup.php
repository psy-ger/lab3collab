<?php
    session_start();
    include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
    require_once "../connect.php";

    $full_name = $_POST['name'];
    $full_surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm){
        mysqli_query($connect, "INSERT INTO users(id, name, surname, login, password, lang, role) VALUES  (NULL,'$full_name','$full_surname','$login','$password','ru','client')");
        $_SESSION['msg2'] = $Lang['accept'];
        header('Location: ../index.php');
    }else{
        $_SESSION['message'] = $Lang['error'];
        header('Location: re');
    }
