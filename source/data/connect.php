<?php

define("DB_HOST", "localhost");
define("DB_NAME", "backend");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

try {

	$database = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASSWORD);
	$database->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . ";");
	$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
	$opt = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
	];
	$conn = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);


	if ($conn) {
		echo 'successfull';
	} else {
		print_r($conn->errorInfo());
		$conn = null;
	}
} catch (PDOException $e) {
	if ($conn !== null) {
		echo $e->getMessage();
	}
	$conn = null;
}

?>