<!DOCTYPE html>
<html>
    <head>
        <!--Style CSS Link-->
        <link rel="stylesheet" href="../CSS/loginStyl.css">
    </head>
    <body class = "Body">
        <div class = "Hedder">
            <img src="../Resources/Logo.png" alt="Car Parts Logo" class="logo">
            <h1>Car Parts</h1>
        </div>
        <!--Login Form-->
        <form action="" method="post" class="loginForm">
            <h3 class="formHeader">Login</h3>
            <!--Username-->
            <label for="Username">Username</label><br>
            <input type="text" class = "inputField" name = "Username" placeholder="Username"><br>
            <span class="errorSpan" id = "UNameErr">testU</span><br>
            <!--Password-->
            <label for="Password">Password</label><br>
            <input type="password" class="inputField" name="Password" id="Password" placeholder="Password"><br>
            <span class="errorSpan" id = "PassErr">testP</span><br>
            <!--Submit Button-->
            <button type="submit" class="submitBtn">Login</button>
        </form>
        <!--Registration Link-->
        <p class="registerText">
            <a href = "registrationVw.php">Don't have an account? Register Here</a> 
        </p>
        <span class="errorSpan" id="confirm"></span>
        <!--Validation PHP Link-->
        <?php include"../PHP/loginP.php"?>    
    </body>
</html>