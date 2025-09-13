<!DOCTYPE html>
<html>
    <head>
        <!--Style CSS Link-->
        <link rel="stylesheet" href="../../CSS/registrationStyl.css">
    </head>
    <body>
        <div class = "Header">
            <img src="../../Resources/Logo.png" alt="Car Parts Logo" class="logo">
            <h1>Car Parts</h1>
        </div>
        <!--Login Form-->
        <form action="" method="post" class="registerForm">
            <h3 class="formHeader">Register</h3>
            <!--Username-->
            <label for="Username">Username</label><br>
            <input type="text" class = "inputField" name = "UName" placeholder="Username"><br>
            <span class="errorSpan" id = "UNameErr"></span><br>
            <!--Password-->
            <label for="Password">Password</label><br>
            <input type="password" class="inputField" name="Password" id="Password" placeholder="Password" title="Password must be 8-16 Characters long and contain at laest one number, letter and special character"><br>
            <span class="errorSpan" id = "PassErr"></span><br>
            <!--Confirm Password-->
            <label for="ConfirmPass">Confirm Password</label><br>
            <input type="password" class = "inputField" name = "ConfirmPass" placeholder="Password"><br>
            <span class="errorSpan" id = "CPassErr"></span><br>
            <!--Submit Button-->
            <button type="submit" class="submitBtn">Register</button>
        </form>
        <!--Registration Link-->
        <p class="loginText">
            <a href = "../../View/loginVw.php">Already have an account? Login Here</a> 
        </p>
        <!--Validation PHP Link-->
        <?php include"../adminPHP/adminRegP.php"?>
        
    </body>
</html>