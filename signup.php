<?php

    require_once 'admin/configDB.php';


    //connect to the db
    $conn = mysqli_connect($host, $user, $pass, $dbName);
    
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    };



    require_once 'views/signup.view.php';
?>