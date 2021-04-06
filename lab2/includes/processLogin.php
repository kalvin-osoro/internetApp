<?php 

include_once 'db.php';
include_once 'user.php';
// include_once 'account.php';

if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['userpassword'];
  $user= new User();
  $user->setName($username);
  $user->setPassword($password);
  $dbConnect= new DBConnector();
  $pdo= $dbConnect->connect();
  if($user->login($pdo)){

    $_SESSION['username'] = $user->getName();
      header("Location: ../home.php");
      
  }else{
      $error="Invalid username or password";
  }
  $dbConnect->closeConnection();
}
?>

