<?php
    session_start();
    require_once '../connect.php';

    $bad_login = $_POST['bad_login'];
    $bad_pass = $_POST['bad_password'];
    $new_login = $_POST['new_login'];
    $new_pass = $_POST['new_password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$bad_login' AND `password` = '$bad_pass'");
    if (mysqli_num_rows($check_user) > 0){
        $id = mysqli_fetch_assoc($check_user);
        $id_ = $id['id'];
        mysqli_query($connect, "UPDATE `users` SET `login` = '$new_login' WHERE `users`.`id` = '$id_'");
        mysqli_query($connect, "UPDATE `users` SET `password` = '$new_pass' WHERE `users`.`id` = '$id_'");
        header("Location: crud.php");
    }
    else{
        {

            $_SESSION['msg1'] = 'Вы ввели неверный логин или пароль';
            header("Location: editlist.php");
        }

    }

