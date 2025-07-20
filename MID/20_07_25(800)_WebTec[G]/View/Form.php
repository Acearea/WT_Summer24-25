<!DOCTYPE html>
<html>
    <head>
        <style>
            .table
            {
                color: rgb(50,50,50);

            }
        </style>
    </head>
<title> AIUB Registration Form </title>
    <body>
        <center>
            <h1 style="color: blue;"> AIUB </h1>
            <h2 style="color: blue;"> Registration Form </h2>
        </center>
        <h2>Compleate the Registration</h2>
        <table class="table">
            
            <tr>
                <td>Full Name:</td>
                <td> <input type="text"> </td>
            </tr>

            <tr>
                <td>Email:</td>
                <td> <input type="text"> </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td> <input type="text"> </td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td> <input type="radio" name = "des"> Male 
                <input type="radio" name = "des"> Female
                <input type="radio" name = "des"> Other </td>
            </tr>

            <tr>
                <td>Languages Known:</td>
                <td> <input type="checkbox" name = "des"> English 
                <input type="checkbox" name = "des"> Bangla 
                <input type="checkbox" name = "des"> Hindi 
                <input type="checkbox" name = "des"> French 
                <input type="checkbox" name = "des"> Chinese </td>
            </tr>

            <tr>
                <td>Country:</td>
                <td>
                    <select name="">
                        <option value="">--Select--</option>
                        <option value="Bangladeh"> Bangladesh </option>
                        <option value="India"> India </option>
                        <option value="France"> France </option>
                        <option value="China"> China </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="" id=""></td>
            </tr>

            <tr>
                <td>Upload Photo:</td>
                <td> <input type="button" value="Choose File"> <input type="image" src="" alt="No File chosen"></td>
            </tr>

            <tr>
                <td>Comments:</td>
                <td> <textarea rows="" cols=""> </textarea> </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="button" value="Register"></td>
            </tr>

        </table>

    </body>
</html>