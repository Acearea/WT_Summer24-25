<?php
include("../includes/db_connect.php");
session_start();
$error = '';
if(isset($_SESSION['error'])){ $error = $_SESSION['error']; unset($_SESSION['error']); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>Customer Login</h2>
    <?php if($error != ''){ echo '<div class="error">'.htmlspecialchars($error).'</div>'; } ?>
    <form method="post" action="../controllers/login_process.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <p>No account? <a href="register.php">Register</a></p>
</div>
</body>
</html>