<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
    include "../Resources/config.php";
        $uName=$pass="";
        $uNameErr=$passErr="";
        $loginValid = false; 
        function clean_input($data)
        {
            $data=trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["UName"])){
                $uNameErr = "Name is Required";
            }
            else{
                $uName = clean_input($_POST["UName"]);
            }

            if(empty($_POST["Password"])){
                $passErr = "Password is Required";
            }
            else{
                $pass= clean_input($_POST["Password"]);
                }
        
        
        echo "<script>
            document.getElementById('UNameErr').innerText = '$uNameErr';
            document.getElementById('PassErr').innerText = '$passErr';
            </script>";
        if(empty($uNameErr) && empty($passErr)){
            $sql="select username, password, role from logininfo where username = ?";
            $temp=$conn->prepare($sql);
            if($temp){
                $temp->bind_param("s",$uName);
                $temp->execute();
                $results=$temp->get_result();

                if($results->num_rows>0){
                    $row=$results->fetch_assoc();
                    $hashpass=$row['password'];
                    if(password_verify($pass,$hashpass)){
                        $loginValid=true;
                        $role=$row['role'];
                        switch($role){
                            case 'admin':
                                header("location: ../Admin/AdminView/adminDashVw.php");
                                break;
                            case 'customer':
                                header("location: ../Customer/CustomerView/customerDashVw.php");
                                break;
                            case 'manager':
                                header("location: ../Manager/ManagerView/managerDashVw.php");
                                break;
                            case 'staff':
                                header("location: ../Staff/StaffView/staffDashVw.php");
                                break;
                            default:
                                echo"<script>document.getElementById('confirm').innerText='Login successful but no role defined.';</script>";
                                break;
                        }
                        exit();}
                        else{
                            $uNameErr="Username does not exist";
                        }
                    }
                    else{
                        echo"Connection Failed".$conn->error;
                    }
                }
            }
        }
    ?>
</body>
</html>

