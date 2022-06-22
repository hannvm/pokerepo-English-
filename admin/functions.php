<?php 

	require_once 'configDB.php';
	require_once 'config.php';


	//POKEDEX FUNCTIONS
	//returns all pokemon data from the db
	function getPokeData($dsn,$user,$pass,$totalPokeData){

		$pdo = new PDO($dsn, $user, $pass);		//create a PDO instance
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);	//set default so data is returned as an object, can be overridden
	
		//PDO query - the SQL
		$stmt = $pdo->query('SELECT * FROM pokedata');		//select all data from pokedata table
	
		while($row = $stmt->fetch()){           //adds all db data to the totalPokeData array
			$totalPokeData[] =  $row;
		};
	
		return $totalPokeData;                  //return all the data as a multidimensional array
	};


	function printPokedexItem($pokemon) { ?>
		<div class="col">
			<div class="card" style="width: 18rem;">
				<img src="img/pikachu.webp" class="card-img-top" alt="...">
				<div class="card-body text-center">
					<h5 class="card-title"><?php echo $pokemon->name; ?></h5>
					<table class="table table-borderless text-start">
						<tbody>
							<tr>
								<td class="fw-bold">Type</td>
								<td><?php echo $pokemon->type; ?></td>
							</tr>
							<tr>
								<td class="fw-bold">ID</td>
								<td><?php echo $pokemon->pokedex_id; ?></td>
							</tr>
							<tr>
								<td class="fw-bold">Total Score</td>
								<td><?php echo $pokemon->total; ?></td>
							</tr>
						</tbody>
					</table>
					<form method="GET" action="pokeprofile.php">
						<input type="hidden" name="id" value="<?php echo $pokemon->database_id; ?>">    <!-- Goes to pokeprofile page and sets the GET id  to the pokemon id number-->
						<button type="submit" class="btn btn-dark">See Full Profile</button>
					</form>
				</div>
			</div>
		</div>
	<?php };

	function printPokemonProfile($currPokemon) { ?>
		<h1 class="py-3"><?php echo $currPokemon->name; ?></h1>
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row g-0">
				<div class="col-lg-2">
					<img src="img/pikachu.jpg" class="img-fluid rounded-start" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col">Category</th>
									<th scope="col">Value</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Type</td>
									<td><?php echo $currPokemon->type; ?></td>
								</tr>
								<tr>
									<td>ID</td>
									<td><?php echo $currPokemon->pokedex_id; ?></td>
								</tr>
								<tr>
									<td>HP</td>
									<td><?php echo $currPokemon->hp; ?></td>
								</tr>
								<tr>
									<td>Attack</td>
									<td><?php echo $currPokemon->attack; ?></td>
								</tr>
								<tr>
									<td>Defense</td>
									<td><?php echo $currPokemon->defense; ?></td>
								</tr>
								<tr>
									<td>Sp. Attack</td>
									<td><?php echo $currPokemon->spattack; ?></td>
								</tr>
								<tr>
									<td>Sp. Defense</td>
									<td><?php echo $currPokemon->spdefense; ?></td>
								</tr>
								<tr>
									<td>Speed</td>
									<td><?php echo $currPokemon->speed; ?></td>
								</tr>
								<tr>
									<td>Total</td>
									<td><?php echo $currPokemon->total; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php };


	//SIGNUP FUNCTIONS
	function checkEmptyFields($fname, $lname, $email, $pwd, $pwdrepeat) {
		$result;	//will equal true if there are empty fields, and false if all have data
		if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
			$result = true;
		} else {
			$result = false;
		}
	};

	function checkUsernameExists($conn, $username) {
		$sql = "SELECT * FROM users WHERE username = ?;";	//sql statement
		$stmt = mysqli_stmt_init($conn);	//prepared stmt for security
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmterror"); //send the user back to signup page with info to load error message
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $username);		//fill in variable data to sql code
		mysqli_stmt_execute($stmt);							//execute the statement
		$resultData = mysqli_stmt_get_result($stmt);		//get the data from stmt

		if($row = mysqli_fetch_assoc()) {					//assigns any data found to $row
			return $row;									//return data if found												
		} else {
			$result = false;
			return $result;								//returns false if data doesn't match
		}

		mysqli_stmt_close($stmt);
	};

	// write universal function to check if something exists where you pass in the column you're checking as a param.

	//attempt at universal check function - not done 
	function checkSomethingExists($conn, $searchItem, $column) {
		$sql = "SELECT * FROM" . $column . "WHERE username = ?;";
		$stmt = mysqli_stmt_init($conn);	//prepared stmt for security
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmterror"); //send the user back to signup page with info to load error message
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $searchItem);		//fill in variable data to sql code
		mysqli_stmt_execute($stmt);							//execute the statement

		$resultData = mysqli_stmt_get_result($stmt);		//get the data from stmt

		if($row = mysqli_fetch_assoc()) {					//assigns any data found to $row
			return $row;									//return data if found												
		} else {
			$result = false;
			return $result;								//returns false if data doesn't match
		}

		mysqli_stmt_close($stmt);
	};

	function checkUsernameValid($username) {
		$result;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$result = true;
		} else {
			$result =false;
		}
		return $result;
	};

	function checkNameValid($name) {
		$result;
		if (!preg_match("^[\w'\-,.][^0-9_!¡??¿/\\+=@#$%&*(){}|~<>;:[\]]{2,}$", $name)) {
			$result = true;
		} else {
			$result =false;
		};
		return $result;
	};

	function checkEmailValid($email) {
		$result;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = true;
		} else {
			$result =false;
		}
		return $result;
	};

	function checkPasswordMatch($pwd, $pwdrepeat) {
		$result;
		if ($pwd !== $pwdrepeat) {
			$result = true;
		} else {
			$result =false;
		}
		return $result;
	};	


?>