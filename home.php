<?php
session_start();
require "includes/db.php";
require "includes/account.php";
require "includes/user.php";
// if (!isset($_SESSION['userId'])) {
//     header("Location: login.php");
// }
$dbConnect= new DBConnector();
$pdo=$dbConnect->connect();
$user= new User($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="center" id="home">

        <div class="profile" id="logo-img">
            <img src="images/profile.jpg" id="logo-img" >
        </div>
        <div>
            <p>Name</p>
            <p><?php echo $user->getName()?></p>
        </div>
        <div class="name" id="name">
          Full name:
        </div>
        
        <button id="btn">Logout</button>
    </div>
</body>
</html>