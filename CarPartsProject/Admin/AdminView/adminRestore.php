<?php
include "../../Resources/config.php";
$message="";
$backupDir = "../AdminResource/";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['backup_file'])) {
    $selectedFile = $_POST['backup_file'];
    $filePath = $backupDir . $selectedFile;

    if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) == 'sql') {
        $sqlContent = file_get_contents($filePath);
        
        if (empty(trim($sqlContent))) {
            $message = "Error: The selected backup file is empty.";
        } else {
            $queries = explode(';', $sqlContent);
            
            foreach ($queries as $query) {
                $trimmedQuery = trim($query);
                if (!empty($trimmedQuery)) {
                    if (!$conn->query($trimmedQuery)) {
                        $message = "Error restoring database: " . $conn->error;
                        break; 
                    }
                }
            }

            if (empty($message)) {
                $message = "Database restored successfully from: " . htmlspecialchars($selectedFile);
            }
        }
    } else {
        $message = "Error: The selected file does not exist or is not a valid SQL file.";
    }
}

$backupFiles = [];
if (is_dir($backupDir)) {
    $files = scandir($backupDir);
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) == 'sql') {
            $backupFiles[] = $file;
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../AdminStyl/adminDashStyl.css">
    </head>
    <body>
        <div class="topbar">
            <a href="adminEditUsr.php"><button class="menuBtn" id="manageUserBtn">Manage Accounts</button></a>
            <a href="adminDefRole.php"><button class="menuBtn" id="defineRoleBtn">Define Roles</button></a>
            <a href="adminBackup.php"><button class="menuBtn" id="backupDbBtn">Database Backup</button></a>
            <a href="adminRestore.php"><button class="menuBtnAct" id="restoreDbBtn">Restore Database</button></a>
            <a href="adminViewlog.php"><button class="menuBtn" id="viewLogBtn">View Login</button></a>
            <a href="adminBlkData.php"><button class="menuBtn" id="bulkDataBtn">Bulk Data Export/Import</button></a>
            <a href="adminConfSet.php"><button class="menuBtn" id="configSettingBtn">Configure System Settings</button></a>
        </div>
        <div class="contentHome">
            <h2>Restore Database</h2>
            <form method="POST">
                <label>Select a Backup File to Restore</label>
                <select id="backupFile" name="backupFile" required>
                    <?php foreach($backupFiles as $file):?>
                        <option value="<?php echo htmlspecialchars($file); ?>"><?php echo htmlspecialchars($file); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Restore Database</button> 
            </form>
        </div>
    </body>
</html>
