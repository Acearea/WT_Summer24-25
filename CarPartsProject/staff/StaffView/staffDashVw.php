<?php
session_start();

$_SESSION['role']='inventory_staff';
$_SESSION['name']='Inventory Staff';

if($_SESSION['role']!=='inventory_staff'){
    header("Location :");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inventory Staff Dashboard </title>
    <link rel="" href="../Style/style.css">
    

    </style>
</head>
<body>
    <header>
        <h1>Inventory Staff Dashboard</h1>
    </header>

    <p class="wlc"> 
      WELCOME , <?php echo $_SESSION['name']; ?>    </p>

      <div class="feature">
        <h2>Inventory Staff Features</h2>
        <ul>
            <li><a href="shipment.php">Check-In New Shipments</a></li>
            <li><a href="">Perform Cycle Count</a></li>
            <li><a href="">Update Part Bin Location</a></li>
            <li><a href="">Process Customer Return </a></li>
            <li><a href="">Fulfil Web or Phone Oder</a></li>
            <li><a href="">Print Parts Labels or Barcodes</a></li>
            <li><a href="">Request Stock Transfer</a></li>

        </ul>

      </div>

    
</body>
</html>