<?php
    require_once 'admin/functions.php';

    //pokemon data from db saved in variable
    $pokeData = getPokeData($dsn,$user,$pass,$totalPokeData);       //calls the function and saves it in a variable

    $numOfCols = 3;             //total columns for the grid
    $rowCount = 0;              //current number of rows

    require_once 'views/pokedex.view.php';
?>