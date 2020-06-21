<?php
session_start();
require_once '../connect.php';
    // Формируем запрос из таблицы с именем blog
    $sql = "SELECT * FROM `users`";
    $result = $connect->query($sql);
    // В цикле перебираем все записи таблицы и выводим их

if(isset($_GET['del'])){
    $id = ($_GET['del']);

    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'") or die( mysqli_error($connect));
}

    echo '<table border="1">';
    echo '<tr>';
    echo '<td>' . 'ID' .'</td>';
    echo '<td>' . 'Name' .'</td>';
    echo '<td>' . 'Surname' .'</td>';
    echo '<td>' . 'Login' .'</td>';
    echo '<td>' . 'Password' .'</td>';
    echo '<td>' . 'Lang' .'</td>';
    echo '<td>' . 'Role' .'</td>';
    echo '</tr>';


    while ($row = $result->fetch_assoc())
    {


        echo '<tr>';
        echo '<tr>';
        echo '<td>'; echo $row['id']. ' '; echo '</td>';
        echo '<td>'; echo $row['name']. ' '; echo '</td>';
        echo '<td>'; echo $row['surname']. ' ';echo '</td>';
        echo '<td>'; echo $row['login']. ' '; echo '</td>';
        echo '<td>'; echo $row['password']. ' '; echo '</td>';
        echo '<td>'; echo $row['lang']. ' '; echo '</td>';
        echo '<td>'; echo $row['role']. ' '; echo '</td>';
        echo '<td>' . '<a href="editlist.php">Edit</a>'; echo '</td>'; ?>
        <td><a href="crud.php?del=<?= $row['id'] ?>>">Dell</a></td> <?php
        echo '</tr>';
    }
    echo '</table>';