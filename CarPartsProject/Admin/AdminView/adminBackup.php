<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../AdminStyl/adminDashStyl.css">
    </head>
    <body>
        <div class="topbar">
            <a href="adminEditUsr.php"><button class="menuBtn" id="manageUserBtn">Manage Accounts</button></a>
            <a href="adminDefRole.php"><button class="menuBtn" id="defineRoleBtn">Define Roles</button></a>
            <a href="adminBackup.php"><button class="menuBtnAct" id="backupDbBtn">Database Backup</button></a>
            <a href="adminRestore.php"><button class="menuBtn" id="restoreDbBtn">Restore Database</button></a>
            <a href="adminViewlog.php"><button class="menuBtn" id="viewLogBtn">View Login</button></a>
            <a href="adminBlkData.php"><button class="menuBtn" id="bulkDataBtn">Bulk Data Export/Import</button></a>
            <a href="adminConfSet.php"><button class="menuBtn" id="configSettingBtn">Configure System Settings</button></a>
        </div>
        <div class="contentHome">
            <h2>Database Backup</h2>
            <form method="POST">
                <label>Backup</label>
                <input type="text" id="backupName" name="backName" placeholder="Name">
                <button type="submit">Perform Backup</button> 
            </form>
        </div>
        <?php
            include "../AdminPHP/dbBackup.php"
        ?>
    </body>
</html>
