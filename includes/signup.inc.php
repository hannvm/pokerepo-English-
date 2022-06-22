<?php

//check the user came by the correct route and if not, send them to the signup page 
if(isset($_POST["submit"])) {

    //catch user input from form
    $username = $POST["username"];
    $fname = $POST["fname"];
    $lname = $POST["lname"];
    $email = $POST["signupemail"];
    $pwd = $POST["signuppwd"];
    $pwdrepeat = $POST["signuppwdrepeat"];

    require_once('../admin/configDB.php'); //I think
    require_once('../functions.php');

    //check for empty inputs
    if (checkEmptyFields($fname, $lname, $email, $pwd, $pwdrepeat) !== false) {     //uses function to check if user input is empty or not
        header("location: ../signup.php?error=emptyinput"); //send the user back to signup page with info to load error message
        exit(); //stop the script running
    };

    //check if username exists
    if (checkUsernameExists($conn, $username) !== false) {     
        header("location: ../signup.php?error=usernametaken"); //send the user back to signup page with info to load error message
        exit();
    };

    //check if email exists


    //check for valid username
    if (checkUsernameValid($username) !== false) {     
        header("location: ../signup.php?error=invalidusername"); //send the user back to signup page with info to load error message
        exit();
    };

    //check for valid first name
    if (checkNameValid($fname) !== false) {     
        header("location: ../signup.php?error=invalidname"); //send the user back to signup page with info to load error message
        exit();
    };

    //check for valid last name
    if (checkNameValid($lname) !== false) {     
        header("location: ../signup.php?error=invalidname"); //send the user back to signup page with info to load error message
        exit();
    };

    //check for valid email
    if (checkEmailValid($email) !== false) {     
        header("location: ../signup.php?error=invalidemail"); //send the user back to signup page with info to load error message
        exit();
    };

    //check for password match
    if (checkPasswordMatch($pwd, $pwdrepeat) !== false) {     
        header("location: ../signup.php?error=pwdmatcherror"); //send the user back to signup page with info to load error message
        exit();
    };
    
    createUser($conn, $username, $fname, $lname, $email, $pwd);


} else { //load signup page if user arrives by wrong route
    header("location: ../signup.php");
    exit(); //stop the script running
};

