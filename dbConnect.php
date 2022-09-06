<?php 
    $dbConnection = mysqli_connect('localhost', 'root', '230Qm4@7BrucyLink', 'php_hardisk');

    // check whether the connection failed
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL: '.mysqli_connect_errno();
        exit();
    }

    // offer 中文
    // mysqli_set_charset($dbConnection, 'utf8');
?>