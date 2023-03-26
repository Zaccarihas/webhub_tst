<?php

    $dbhost = 'localhost';
    $dbname = 'auth';
    $dbuser = 'dev';
    $dbpass = 'Av4rak!N';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno()){
        exit('Failed to connect to db: '.mysqli_connect_errno);
    }
    



