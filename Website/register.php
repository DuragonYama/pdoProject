<?php 

    require "../Database/user.php";
    if (isset($_POST['submitButton'])) {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="firstname" placeholder="firstname" required>
        <input type="text" name="lastname" placeholder="lastname" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password2" placeholder="password repeat" required>
        <input type="submit" name="submitButton">
    </form>
</body>
</html>