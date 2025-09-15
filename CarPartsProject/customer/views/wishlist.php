<?php
session_start();
include("../includes/db_connect.php");
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
$uid = intval($_SESSION['user_id']);
$res = $conn->query("SELECT p.* FROM wishlist w JOIN products p ON w.product_id=p.pid WHERE w.user_id=$uid");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>My Wishlist</h2>
    <ul>
    <?php while($row = $res->fetch_assoc()){ echo '<li>'.htmlspecialchars($row['name']).' - ৳'.number_format($row['price'],2).'</li>'; } ?>
    </ul>
    <a href="customer_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>