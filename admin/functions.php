<?php 

	require_once 'configDB.php';
	require_once 'config.php';


	//POKEDEX FUNCTIONS
	//returns all pokemon data from the db
	function getPokeData($dsn,$user,$pass){

		$totalPokeData;

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
		<div class="align-self-center col-lg-4 mb-3">
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
	function emptyInputSignup($username, $fname, $lname, $email, $supwd, $supwdrep) {
		$result;
		if (empty($username) || empty($fname) || empty($lname) || empty($email) || empty($supwd) || empty($supwdrep)){
			$result = true;
		} else {
			$result = false;
		};
		return $result;
	};

	//check if username is valid characters
	function invalidUsername($username) {
		$result;
		if (preg_match("^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$", $username)){	//Dani has username outside of preg_match brackets
			$result = true;
		} else {
			$result = false;
		};
		return $result;
	};

	//check if email is a valid email
	function invalidEmail($email) {	
		$result;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){	
			$result = true;
		} else {
			$result = false;
		};
		return $result;
	};

	//check if passwords match
	function pwdMatch($supwd, $supwdrep) {
		$result;
		if ($supwd !== $supwdrep){	
			$result = true;
		} else {
			$result = false;
		};
		return $result;
	};

	//checks if username or email are alreday registered in the database
	function userExists($conn, $username, $email) {
		$sql = "SELECT * FROM users WHERE username = ? OR email == ?;";
		$stmt = mysqli_stmt_init($conn); //prepared statment for security (doesn't allow user to inject code)
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmtfailuserexists");
            exit();
		}
		
		mysqli_stmt_bind_param($stmt, "ss", $username, $email); //bind params with statement, ss is quantity of params
		mysqli_stmt_execute($stmt); //execute statement

		$resultData = mysqli_stmt_get_result();	//results of sql statement

		if($row = mysqli_fetch_assoc()) {			//fetch data as associative array. If data, return true and assign data to variable $row
			return $row;							//returns data from database
		} else {
			$result = false; 	//no data, return as false
			return $result;
		};

		mysqli_stmt_close($stmt); 	// close prepared statement

	};

	//function to create user
	function createUser($conn, $username, $fname, $lname, $email, $pwd) {
		$sql = "INSERT INTO users(username, fname, lname, email, password) VALUES(?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn, $sql); // prepared statment for security (doesn't allow user to inject code)
		if(!mysqli_stmt_prepare($stmt, $sql)){	// if statment doesn't work show error message
			header("location: ../signup.php?error=stmtfailsignupuser");
            exit();
		};

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);	// hash password

		mysqli_stmt_bind_param($stmt, "sssss", $username, $fname, $lname, $email, $pwd); // bind params with statement, ss is quantity of params
		mysqli_stmt_execute($stmt); // execute statement
		mysqli_stmt_close($stmt); 	// close prepared statement

	};


