<?php
include_once 'db.php';
include_once 'user.php';

if(isset($_POST['changePassword'])){
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];
    $confPassword=$_POST['confirmPassword'];
    $dbConnect= new DBConnector();
    $pdo= $dbConnect->connect();
    $user =new User();  
    $user->changePassword($pdo);
}
else{
    $error= "could not change password";
}
