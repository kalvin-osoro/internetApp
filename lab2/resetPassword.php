<?php
$error ="";
 $success = "";

require_once("includes/db.php");
require_once("includes/account.php");
require_once("includes/user.php");
// require_once("includes/processLogin.php");
require_once("includes/passwordreset.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />   -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <form style="margin-top: 20px;" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="$_POST" id="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter current password" name="currentPassword">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter new password" name="newPassword">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm password" name="confirmPassword" id="pwd">
            </div>

            <!-- <div class="form-group form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> Remember me 
                </label>
                <span style="float: right;"><a href="#"> Already have an account? </a></span>
              </div> -->
            <button type="submit" class="btn btn-primary" name="changePassword">submit</button>
            <p><?php echo '<label  class="text-danger">' . $error . '</label>'; ?></p>
            <p><?php echo '<label  class="alert alert-success">' . $success . '</label>'; ?></p>
        </form>
    </div><br><br>
    <!--end of main content-->

</body>

</html>