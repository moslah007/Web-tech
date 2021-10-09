<!DOCTYPE html>
<html>
<head>
    <style>
            .label
            {
                font-weight: bold;
                float: left;
                width: 200px;
                text-align: right;
                padding-right: 12px;
                margin-top: 10px;
                clear: left;
            }
            .error
            {
                color: #ff0000;
            }
            input, textarea
            {
                margin-top: 10px;
            }
            input, select
            {
                margin-top: 12px;
            }
            .submit
            {
                margin-left: 210px;
                margin-top: 20px;
            }
    </style>
</head>
<body>
    <?php
    $currpass = $pass = $newpass = "";
    $currpassErr = $passErr = $newpassErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["currpass"]))
        {
            $currpassErr = "Current Password is required";
        }
        else
        {
            $currpass = test_input($_POST["currpass"]);
        }
        if(empty($_POST["pass"]))
        {
            $passErr = "New password cannot be empty";
        }
        elseif(strlen($_POST["pass"]) < 8)
        {
            $passErr = "New Password must contain at least 8 characters";
            $pass = test_input($_POST["pass"]);
        }
        elseif(strcmp($_POST["currpass"], $_POST["pass"]) == 0)
        {
            $passErr = "New password shouldn't be same as the current one";
        }
        else
        {
            $pass = test_input($_POST["pass"]);
        }
        if(empty($_POST["newpass"]))
        {
            $newpassErr = "Cannot be empty";
        }
        elseif(strcmp($_POST["pass"], $_POST["newpass"]) != 0)
        {
            $newpassErr = "Retyped password must match with the New Passwords";
            $newpass = test_input($_POST["newpass"]);
        }
        else
        {
            $newpass = test_input($_POST["newpass"]);
        }

    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div><label class="label" for="currpass" >Current Password:</label>
            <input type="password" id="currpass" name="currpass">
            <span class="error">* <?php echo $currpassErr; ?></span></div>
        <div><label class="label" for="pass" ><font color = "green"> New Password: </font></label>
             <input type="password" id="pass" name="pass">
             <span class="error">* <?php echo $passErr; ?></span></div>
        <div><label class="label" for="newpass" ><font color = "red"> Retype New Password: </font></label>
             <input type="password" id="newpass" name="newpass">
             <span class="error">* <?php echo $newpassErr; ?></span></div>
        <input class="submit" type="submit" name="submit" value="Submit">
    </form><br><br>
    <h3 class="label">Your Input:</h3>
    <div class="submit">
    <?php
        echo "Current Password: " . $currpass."<br>";
        echo "New Password: ".$pass."<br>";
        echo "Retyped New Password: ".$newpass."<br>";
    ?>
</body>
</html>
