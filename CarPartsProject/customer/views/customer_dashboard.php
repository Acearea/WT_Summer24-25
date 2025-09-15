<?php
session_start();
include("../includes/db_connect.php");
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/customer.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($user_name); ?></h2>
    <div class="nav">
        <a href="profile.php">Profile</a> |
        <a href="orders.php">My Orders</a> |
        <a href="wishlist.php">Wishlist</a> |
        <a href="../controllers/logout.php">Logout</a>
    </div>
    <h3>Available Products</h3>
    <ul>
    <?php
    $p = $conn->query("SELECT * FROM products ORDER BY pid DESC");
    while($prod = $p->fetch_assoc()){
        echo '<li>'.htmlspecialchars($prod['name']).' - ৳'.number_format($prod['price'],2).' 
        <form style="display:inline" method="post" action="../controllers/wishlist_process.php">
            <input type="hidden" name="product_id" value="'.intval($prod['pid']).'">
            <button type="submit" name="add">Add to wishlist</button>
        </form>
        <form style="display:inline" method="post" action="../controllers/order_process.php">
            <input type="hidden" name="product_id" value="'.intval($prod['pid']).'">
            <button type="submit" name="order">Order Now</button>
        </form>
        </li>';
    }
    ?>
    </ul>
</div>
</body>
</html>