<?php
include "../../Resources/config.php";
$dbName="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $dbName=trim($_POST["backName"]);

    if(!empty($dbName)){
        if(preg_match("/^[a-zA-Z-']*$/", $dbName)){
            
            $database="carautoshop";
            $backupFile=$database.$dbName.".sql";
            $backupPath="../AdminResource/".$backupFile;
            $fileHandl=fopen($backupPath,'w');

            if($fileHandl===false){
                echo"Error could not open file";
            }else{
                $tables=array();
                $result=$conn->query("show tables");
            if($result){
            while($row=$result->fetch_row()){
                $tables[]=$row[0];
            }}
            foreach($tables as $table){
                $result=$conn->query("show create table `$table`");
                if($result){
                    $row=$result->fetch_row();
                    fwrite($fileHandl, "\n\n" . $row[1]. ";\n\n");
                }
                $result=$conn->query("select * from `$table`");
                if($result){
                    $numFields=$result->field_count;
                    while($row=$result->fetch_row()){
                        $sql="insert into `$table` values(";
                        for ($i=0; $i<$numFields; $i++){
                            $sql.="'".$conn->real_escape_string($row[$i])."'";
                            if($i<($numFields-1)){
                                $sql .=", ";
                            }
                        }
                        $sql .=");\n";
                        fwrite($fileHandl, $sql);
                }
            }
                
            
        }
        fclose($fileHandl);
        }
    }else{
        echo"Backup Name cannot be empty";
    }
}
}
?>