<?php include_once 'templates/header.php' ?>

    <div class="main-container d-flex flex-column justify-content-center align-items-center">

        <h1 class="py-3">Pokedex</h1>
        <div class="container mb-3">

            <?php //printPokedex($pokeData, $totalPokemonCount,$pokemonCounter); 

            foreach($pokeData as $pokemon) {  
                if($rowCount % $numOfCols == 0) {   //create new row when necessary    ?>    
                    <div class="row mb-3">             
                <?php }
                $rowCount++;                    //add one to the row count
                printPokedexItem($pokemon);     //print individual pokemon
                if($rowCount % $numOfCols == 0) { ?>
                    </div>
                <?php }
            }; ?>
        </div> <!--End of cards container-->
    </div> <!--End of page container-->

<?php include_once 'templates/footer.php' ?>