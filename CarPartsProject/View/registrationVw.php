<!DOCTYPE html>
<html>
    <head>
        <!--Style CSS Link-->
        <link rel="stylesheet" href="../CSS/registrationStyl.css">
    </head>
    <body>
        <div class = "Header">
            <img src="../Resources/Logo.png" alt="Car Parts Logo" class="logo">
            <h1>Car Parts</h1>
        </div>
        <!--Login Form-->
        <form action="" method="post" class="registerForm">
            <h3 class="formHeader">Register</h3>
            <!--Username-->
            <label for="Username">Username</label><br>
            <input type="text" class = "inputField" name = "Username" placeholder="Username"><br>
            <span class="errorSpan" id = "UNameErr"></span><br>
            <!--Password-->
            <label for="Password">Password</label><br>
            <input type="password" class="inputField" name="Password" id="Password" placeholder="Password"><br>
            <span class="errorSpan" id = "PassErr"></span><br>
            <!--Confirm Password-->
            <label for="ConfirmPass">Confirm Password</label><br>
            <input type="password" class = "inputField" name = "ConfirmPass" placeholder="Password"><br>
            <span class="errorSpan" id = "CPassErr"></span><br>
            <!--Email-->
            <label for="Email">Email</label><br>
            <input type="email" class="inputField" name="Email" id="Email" placeholder="123.abc@email.com"><br>
            <span class="errorSpan" id = "EmailErr"></span><br>
            <!--Phone Number-->
            <label for="PhoneNumber">Phone Number</label><br>
            <input type="text" class = "inputField" name = "PNumber" placeholder="01........."><br>
            <span class="errorSpan" id = "PhnNumErr"></span><br>
            <!--Billing Address-->
            <label for="Billing Address">Address</label><br>
            <input type="text" class="inputField" name="BAddress" id="BAddress" placeholder="House No. Road No. , Area, City, District"><br>
            <span class="errorSpan" id = "BAddressErr"></span><br>

            
            <!--Submit Button-->
            <button type="submit" class="submitBtn">Register</button>
        </form>
        <!--Registration Link-->
        <p class="loginText">
            <a href = "loginVw.php">Already have an account? Login Here</a> 
        </p>
        <!--Validation PHP Link-->
        <?php include"../PHP/registrationP.php"?>
        
    </body>
</html>