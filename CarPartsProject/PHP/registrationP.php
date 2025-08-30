<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
        $uName=$pass="";
        $uNameErr=$passErr="";
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
        }
        echo "<script>
            document.getElementById('UNameErr').innerText = '$uNameErr';
            document.getElementById('PassErr').innerText = '$passErr';
            </script>";
    ?>
</body>
</html>

