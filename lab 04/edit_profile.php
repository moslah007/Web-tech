<!DOCTYPE html>
<html>
    <head>
    <style>
        .label {
            font-weight: bold;
            float: left;
            width: 200px;
            text-align: right;
            padding-right: 12px;
            margin-top: 10px;
            clear: left;
        }
        input,
        textarea {
            margin-top: 10px;
        }
        .submit {
            margin-left: 210px;
            margin-top: 20px;
        }
    </style>
    </head>
    <body>
    <table border="2px">
        <tr>
            <th colspan="2">
                <?php
                    include 'head34.php';
                ?>
            </th>
        </tr>
        <tr>
            <td width="300px">
                <?php
                    include 'dashboard.php';
                ?>
            </td>
            <td style="width: 65%;">
            <h3>EDIT PROFILE</h3>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div><label class="label" for="name" > Name:</label>
            <input type="text" id="name" name="name"></div>
            <div><label class="label" for="email" > Email:</label>
            <input type="text" id="email" name="email"></div>
            <div><label class="label" for="uname" > User Name:</label>
            <input type="text" id="uname" name="uname"></div>
            <div><label class="label" for="pass" > Password:</label>
            <input type="password" id="pass" name="pass"></div>
            <div><label class="label" for="cpass" >Confirm Password:</label>
             <input type="password" id="cpass" name="cpass"></div>
            <div>
            <label class="label" for="radio" >Gender:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
        </div>
        <div><label class="label" for="birthday">Date of Birth:</label>
        <input type="date" id="birthday" name="birthday"></div>
        <input class="submit" type="submit" name="submit" value="Submit">
        <input type="reset">
    </form><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                    include 'foot34.php';
                ?>
            </td>
        </tr>
    </table>
    </body>
</html>
