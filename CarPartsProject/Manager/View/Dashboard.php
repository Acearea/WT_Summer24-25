<!DOCTYPE html>
<html>
    <head>
        <title>Manager Dashboard</title>
        <link rel="stylesheet" href="../CSS/Dashboard_style.css">
    </head>
</html>
<body>
    <div class="dashboard">
        <h1>Manager Dashboard</h1>
        <p>Welcome, Please select an action:</p>
        <div class="button-grid">
            <form action="Approve_orders_view.php" method="post">
                <button type="submit" class="btn">Approve/Reject purchase Order</button>
            </form>
            <form action="Reorder_levels_view.php" method="POST">
                <button type="submit" class="btn">Set Parts Reorder Levels</button>
            </form>

        </div>
    </div>
</body>