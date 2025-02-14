<?php 

    require "../Database/user.php";

    if (isset($_POST['submitButton'])) {
        $User->loginUser($_POST['email'], $_POST['password']);
        $notification = "<div class='notification success'>Login Successful!</div>";
        header("refresh:3; url = index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/register.css">
    <link rel="stylesheet" href="../Css/basic.css">
</head>
<body>
    <?php if (isset($notification)) {echo $notification;} ?>
    <form method="POST">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submitButton" value="Login">
        <p class="form-link">Don't have an account? <a href="register.php">Sign up</a></p>
    </form>
</body>
</html>

