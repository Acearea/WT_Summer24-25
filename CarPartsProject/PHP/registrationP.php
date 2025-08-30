<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
        $uName=$pass=$cPass=$email=$phnNum=$bAddress="";
        $uNameErr=$passErr=$cPassErr=$emailErr=$phnNumErr=$bAddressErr="";
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
            elseif(!preg_match("/^[a-zA-Z-']*$/", clean_input($_POST["UName"]))){
                $uNameErr = "Only Letters and Spaces Allowed";
            }
            else{
                $uName = clean_input($_POST["UName"]);
            }

            if(empty($_POST["Password"])){
                $passErr = "Password is Required";
            }
            else{
                $pass= clean_input($_POST["Password"]);
                if(strlen($pass)<8||strlen($pass)>16){
                    $passErr="Password must be within 8 -16 characters long";
                }
                elseif(!preg_match("/[A-Za-z]/", $pass)){
                    $passErr = "Password must contain at least 1 letter ";
                }
                elseif(!preg_match("/\d/", $pass)){
                    $passErr="Password must contain at least 1 number";
                }
                elseif(!preg_match("/[^A-Za-z\d]/", $pass)){
                    $passErr="Password must contain at least one special character";
                }
            }

            if(empty($_POST["ConfirmPass"])){
                $cPassErr="Please confirm your password";
            }
            else{
                $cPass=clean_input($_POST["ConfirmPass"]);
                if($pass !== $cPass){
                    $cPassErr = "Does not match Password";
                }
            }

            if(empty($_POST["Email"])){
                $emailErr="Email is required";
            }
            else{
                $email=clean_input($_POST["Email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr= "Invalid Email address";
                }
            }

            if(empty($_POST["PNumber"])){
                $phnNumErr="Phone number is required";
            }
            else{
                $phnNum=clean_input($_POST["Pnumber"]);
                if(!preg_match("/^01\d{9}$/", $phnNum)){
                    $phnNumErr="Phone number is invalid";
                }
            }

            if(empty($_POST["BAddress"])){
                $bAddressErr="Address is required";
            }
            else{
                $bAddress=clean_input($_POST["BAddress"]);
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

