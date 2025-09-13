<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
        include "../Resources/config.php";
        $uName=$pass=$cPass=$email=$phnNum=$bAddress="";
        $uNameErr=$passErr=$cPassErr=$emailErr=$phnNumErr=$bAddressErr="";
        $regValid=true;
        $hashpass="";
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
                $regValid=false;
            }
            else{
                $uName = clean_input($_POST["UName"]);
                if(!preg_match("/^[a-zA-Z-']*$/", clean_input($_POST["UName"]))){
                    $uNameErr = "Only Letters and Spaces Allowed";
                    $regValid=false;
                }
            }

            if(empty($_POST["Password"])){
                $passErr = "Password is Required";
                    $regValid=false;
            }
            else{
                $pass= clean_input($_POST["Password"]);
                if(strlen($pass)<8||strlen($pass)>16){
                    $passErr="Password must be within 8 -16 characters long";
                    $regValid=false;
                }
                elseif(!preg_match("/[A-Za-z]/", $pass)){
                    $passErr = "Password must contain at least 1 letter ";
                    $regValid=false;
                }
                elseif(!preg_match("/\d/", $pass)){
                    $passErr="Password must contain at least 1 number";
                    $regValid=false;
                }
                elseif(!preg_match("/[^A-Za-z\d]/", $pass)){
                    $passErr="Password must contain at least one special character";
                    $regValid=false;
                }
            }

            if(empty($_POST["ConfirmPass"])){
                $cPassErr="Please confirm your password";
                    $regValid=false;
            }
            else{
                $cPass=clean_input($_POST["ConfirmPass"]);
                if($pass !== $cPass){
                    $cPassErr = "Does not match Password";
                    $regValid=false;
                }
            }

            if(empty($_POST["Email"])){
                $emailErr="Email is required";
                    $regValid=false;
            }
            else{
                $email=clean_input($_POST["Email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr= "Invalid Email address";
                    $regValid=false;
                }
            }

            if(empty($_POST["PNumber"])){
                $phnNumErr="Phone number is required";
                    $regValid=false;
            }
            else{
                $phnNum=clean_input($_POST["PNumber"]);
                /*if(!preg_match("/^01\d{9}$/", $phnNum)){
                    $phnNumErr="Phone number is invalid";
                }*/
                if(strlen($phnNum)!=11){
                    $phnNumErr="Phone number is invalid";
                    $regValid=false;
                }
            }

            if(empty($_POST["BAddress"])){
                $bAddressErr="Address is required";
                $regValid=false;
            }
            else{
                $bAddress=clean_input($_POST["BAddress"]);
            }
            if($regValid==true){
                $hashpass=password_hash($pass,PASSWORD_DEFAULT);
                $sql="insert into logininfo (username, password, role) values ('$uName', '$hashpass', 'customer')";
                if($conn->query($sql)===true){
                    $tid=$conn->insert_id;
                    echo "Debug: Last inserted ID is $tid";
                    
                    $sql="insert into customerinfo (id, name, password, email, phonenum, address) values('$tid', '$uName', '$hashpass', '$email', '$phnNum', '$bAddress')";
                    if($conn->query($sql)===true){
                        echo"<script> alert('Registration Successful'); window.location.href='../View/loginVw.php'</script>";
                        exit();
                    }
                    
                        else{
                        echo"Connection error customer: ".$conn->error;
                    }
                }
                else{
                    echo"conection error login ".$conn->error;
                }
                
            }
        }
        
        echo "<script>
            document.getElementById('UNameErr').innerText = '$uNameErr';
            document.getElementById('PassErr').innerText = '$passErr';
            document.getElementById('CPassErr').innerText = '$cPassErr';
            document.getElementById('EmailErr').innerText = '$emailErr';
            document.getElementById('PhnNumErr').innerText = '$phnNumErr';
            document.getElementById('BAddressErr').innerText = '$bAddressErr';
            </script>";
    ?>
</body>
</html>

