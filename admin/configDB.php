<?php 

	$host='localhost';
	$dbName='pokemon';
	$user='root';
	$pass='root';

	//DSN - data source name (string with associated data structure to describe db connection source)
	$dsn="mysql:host=$host;dbname=$dbName;charset=utf8";

	$conn = mysqli_connect($host, $user, $pass, $dbName);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	};