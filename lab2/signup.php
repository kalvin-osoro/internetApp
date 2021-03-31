<?php
$error = "";
$success = "";
require_once("includes/db.php");
require_once("includes/account.php");
require_once("includes/user.php");
require_once("includes/processreg.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/signup.js"></script>
    
</head>

<script type="text/javascript">
    $(document).ready(function() {
        //use button click event
        $("#btn").click(function() {
            //get all inpuf field values
            var name = $("#uname").val();
            var email = $("#email").val();
            var password = $("#pwd").val();
            var city = $("#city").val();
            var profile = $("#pp").val();
            //call ajax here
            $.post("includes/processreg.php", {
                    name: name,
                    email: email,
                    password: password,
                    city: city,
                    profile: profile
                },

                function(data, status) {
                    //check result
                    if (data === "success") {
                        $("#response").html("<div class='alert alert-info'>" + data + "</div>");
                    } else {
                        $("#response").html("<div class='alert alert-warning'>" + data + "</div>");
                    }

                });
        });
    });
</script>

<body>

    <div class="container">

        <form style="margin-top: 20px;" action="" method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">

                <input type="text" class="form-control" name="name" placeholder="Enter username" id="uname">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Enter email" id="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="conPassword" placeholder="Re-enter password" id="pwd">

            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City of residence" id="city">

            </div>
            <div class="file-input">
                <label for="pp">Select Profile Photo</label>
                <input type="file" name="profile" id="pp" class="file" required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember me
                </label>

                <span style="float: right;"><a href="login.php"> Already have an account? </a></span>
            </div>
            <button type="submit" class="btn btn-primary" name="register" id="btn">Sign-up</button><br>           
            <p><?php echo '<label  class="text-danger">'.$error.'</label>'; ?></p>
            <p><?php echo '<label  class="alert alert-success">' . $success . '</label>'; ?></p>

            <span id="response"></span>

        </form>
    </div><br><br>
    <!--end of main content-->


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</body>

</html>