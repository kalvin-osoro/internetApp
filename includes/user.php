<?php

include_once 'db.php';
include_once 'account.php';

class User implements Account
{
	protected $name;
	protected $email;
	protected $password;
	protected $newPassword;
	protected $city;
	protected $imagePath;
	protected $message = "";


	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}


	public function setPassword($password)
	{
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}
	public function getNewPassword()
	{
		return $this->newPassword;
	}

	public function setNewPassword($newPassword)
	{
		$this->newPassword = $newPassword;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}
	public function getImagePath()
	{
		return $this->imagePath;
	}
	public function setImagePath($imagePath)
	{
		$this->imagePath = $imagePath;
	}



	public function register($pdo)
	{

		try {

			$sql = 'INSERT INTO user (username, email, password, city, profile_photo) VALUES (:username,:email,:password,:city,:profile_photo)';
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':username', $this->name);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':password', $this->password);
			$stmt->bindParam(':city', $this->city);
			$stmt->bindParam(':profile_photo', $this->imagePath);
			$stmt->execute();

			$stmt = null;
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	public function login($pdo)
	{
		try {

			$sql = "SELECT password FROM user WHERE username=?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$this->name]);
			$row = $stmt->fetch();
			if ($row == null) {
				return false;
			} else if (password_verify($this->password, $row['password'])) {

				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function changePassword($pdo){
		try{
			$sql = 'SELECT Password FROM user WHERE email = ?';
			$stmt = $pdo->prepare($sql);		
			$stmt->execute([$this->getEmail()]);
			$row = $stmt->fetch();
			if($row == null){
				
				echo "account does no exist";
			}
			$passwordHash = password_hash($this->getNewPassword(), PASSWORD_DEFAULT);
			if(password_verify($this->getPassword(), $row['Password'])){
				$stmt = $pdo->prepare('UPDATE User SET Password = ? WHERE email = ?');
				$stmt -> execute([$passwordHash, $this->getEmail()]);
				
				echo "password updated";
			}else
			{
				
				echo "username or password incorrect";
			}

		}catch(PDOException $e){
			return $e->getMessage();
		}

	}
	public function logout($pdo){
		unset($_SESSION);
		$pdo = null;
		header("Location:login.php");
	}
}
