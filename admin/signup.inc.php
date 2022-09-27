<?php

    //when you click the submit button on the signup form it goes to this page

    //check user reached this page correctly (by URL not submit button)
    if (isset($_POST["submit"])) {

        //catch user data from signup form
        $username = $_POST["username"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["suemail"];
        $supwd = $_POST["supwd"];
        $supwdrep = $_POST["supwdrep"];

        require_once 'configDB.php';
        require_once 'functions.php';

        //functions for error handling, missing or incorrect form details
        if(emptyInputSignup($username, $fname, $lname, $email, $supwd, $supwdrep) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        };

        if(invalidUsername($username) !== false) {
            header("location: ../signup.php?error=invalidusername");
            exit();
        };

        if(invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        };

        if(pwdMatch($supwd, $supwdrep) !== false) {
            header("location: ../signup.php?error=pwdnomatch");
            exit();
        };

        if(userExists($conn, $username, $email) !== false) {
            header("location: ../signup.php?error=userexists");
            exit();
        };

        createUser($conn, $username, $fname, $lname, $email, $supwd);

    } else {
        header("location: ../signup.php");
        exit();
    };


