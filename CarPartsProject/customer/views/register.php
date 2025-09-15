<?php
include("../includes/db_connect.php");
session_start();
$error = '';
if(isset($_SESSION['reg_error'])){ $error = $_SESSION['reg_error']; unset($_SESSION['reg_error']); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <?php if($error != ''){ echo '<div class="error">'.htmlspecialchars($error).'</div>'; } ?>
    <form method="post" action="../controllers/register_process.php">
        <input type="text" name="name" placeholder="Full name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password (min 6)" minlength="6" required>
        <textarea name="address" placeholder="Address"></textarea>
        <button type="submit" name="register">Register</button>
    </form>
    <p>Already have account? <a href="login.php">Login</a></p>
</div>
</body>
</html>