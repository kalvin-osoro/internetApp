<?php

include_once 'db.php';
include_once 'user.php';

$user = new User();



if (isset($_POST['register'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conPassword = $_POST['conPassword'];
	$city = $_POST['city'];

	$file_tmp_location = $_FILES["profile"]["tmp_name"];
	$original_file_name = $_FILES["profile"]["name"];

	$file_path = "images/";
	if (move_uploaded_file($file_tmp_location, $file_path . $original_file_name)) {
		$newPath = $file_path . $original_file_name;
		$user->setImagePath($newPath);
	}

	$dbConnect = new DBConnector();
	$pdo = $dbConnect->connect();
	if (!empty($name) && !empty($email) && !empty($password) && !empty($city) && !empty($file_path)) {
		if ($password == $conPassword) {
			$user->setName($name);
			$user->setEmail($email);
			$user->setPassword($password);
			$user->setCity($city);

			$user->register($pdo);
			$success = "Registered successfully";
		} else {
			$error = "password does not match";
		}
	} else {
		$error = "all fields are required";
	}
	$dbConnect->closeConnection();
}
