<?php
session_start();
include("../includes/db_connect.php");
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
$user_id = intval($_SESSION['user_id']);
$res = $conn->query("SELECT * FROM customerinfo WHERE id=$user_id");
if(!$res || $res->num_rows == 0){ echo 'User not found'; exit; }
$user = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>My Profile</h2>
    <form method="post" action="../controllers/profile_update.php">
        <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <input type="text" name="phonenum" value="<?php echo htmlspecialchars($user['phonenum']); ?>">
        <textarea name="address"><?php echo htmlspecialchars($user['address']); ?></textarea>
        <button type="submit" name="update">Update</button>
    </form>
    <br>
    <a href="customer_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>