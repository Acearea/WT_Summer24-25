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
    <link rel="" href="Style/style.css">
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
    background:aliceblue ;
    margin: 0;
}
header{
    background: skyblue;
    padding: 15px;
    color: white;
    text-align: center;

}
.wlc{
    text-align: center;
    margin: 20px;
    font-size: 1.2em;

}
.feature{
    max-width: 600px;
    margin: auto;
    background: white;
    border-radius: 8px;
    padding :20px;
    box-shadow: 0 2px 6px black;

}
.feature h2{
    text-align: center;
    margin-bottom: 15px;
}
ul{
    list-style: none;
    padding: 0;
    margin: 12 px 0;

}
li{
    margin: 12px 0;
}
 ul li a {
    display: block;
    padding: 12px;
    background:peachpuff ;
    color: blue;
    text-decoration: none;
    border-radius: 6px;
   
    
 }

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