<?php include_once 'templates/header.php';

error_reporting (E_ALL ^ E_NOTICE); 
?>

        <!--Main Content-->
        <div class="main-container d-flex flex-column justify-content-center align-items-center">

            
        <?php 
        
        for($i=0; $i<$totalPokemonCount; $i++){
            if ($i == $pokemonId) {     //loops through all, if the db id matches the GET id:
                printPokemonProfile($currPokemon); //this might not be the correct index. should match the db ID
                //print_r($pokeDataArray);
            };
        };
        
        
        ?>

        </div>





        <?php include_once 'templates/footer.php' ?>