<?php

    session_start();
    include "roles/includes.php";
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0)
    {
        $user = mysqli_fetch_assoc($check_user);
          switch ($user['role']) {

                 case 'admin':
                 {
                     $admin = new Admin($user['name'], $user['surname']);
                     $admin->adminGreeting();
                     break;
                 }
                 case 'manager':
                 {
                     $manager = new Manager($user['name'], $user['surname']);
                     $manager->managerGreeting();
                     break;
                 }
                 case 'client':
                 {
                     $client = new Client($user['name'], $user['surname']);
                     $client->clientGreeting();
                     break;
                 }
             }

    }
    else
        {
        $_SESSION['msg'] = 'Вы ввели неверный логин или пароль';
        include "index.php";
        }



