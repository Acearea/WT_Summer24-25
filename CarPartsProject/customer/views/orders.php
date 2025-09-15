<?php
session_start();
include("../includes/db_connect.php");
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
$uid = intval($_SESSION['user_id']);
$sql = "SELECT o.oid, p.name, o.quantity, o.order_date FROM orders o JOIN products p ON o.product_id = p.pid WHERE o.user_id = $uid";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>My Orders</h2>
    <ul>
    <?php while($r = $res->fetch_assoc()){ echo '<li>'.htmlspecialchars($r['name']).' x '.intval($r['quantity']).' ('.$r['order_date'].')</li>'; } ?>
    </ul>
    <a href="customer_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>