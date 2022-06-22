<?php

    /*
        PROJECT NOTES

        Next time it would be better to query the db using the
        pokemonIndex rather than reading the whole database and
        filtering in php.
    
        SQL code would look like:
        
            SELECT * FROM pokedata WHERE database_id = $pokemonIndex;
    
    */


    require_once 'admin/functions.php';

    //pokemon data from db saved in variable
    $pokeData = getPokeData($dsn,$user,$pass,$totalPokeData);       //calls the function and saves it in a variable

    $pokemonIndex = $_GET["id"] - 1;   //index of currPokemon in data
    $totalPokemonCount = count($pokeData);      //total quantity of pokemon in db
    $currPokemon = $pokeData[$pokemonIndex];   //stdObj of the data for the current pokemon

    require_once 'views/pokeprofile.view.php';
?>