<?php

    $connect = mysqli_connect("localhost", "root", "", "lab");

    if(!$connect){
        die("Error database");
    }
