<?php 

    require "../Database/user.php";

    if (isset($_POST['submitButton'])) {
        if ($_POST['password'] == $_POST['password2']) {
            $User->registerUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        } else {
            $notification = "<div class='notification error'>The passwords do not match!</div>";
            header("refresh:3; url = register.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Css/register.css">
    <link rel="stylesheet" href="../Css/basic.css">
</head>
<body>
    <?php if (isset($notification)) {echo $notification;} ?>
    <form method="POST">
        <h2>Register</h2>
        <input type="text" name="firstname" placeholder="firstname" required>
        <input type="text" name="lastname" placeholder="lastname" required>
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password2" placeholder="password repeat" required>
        <input type="submit" name="submitButton" value="Submit">
        <p class="form-link">Already have an account? <a href="login.php">Sign in</a></p>
    </form>
</body>
</html>