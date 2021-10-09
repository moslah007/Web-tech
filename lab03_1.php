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
    $name = $pass = "";
    $nameErr = $passErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]))
        {
            $nameErr = "Name is Required";
        }
        elseif(!preg_match("/^[a-zA-Z0-9._-]*$/", $_POST["name"]))
        {
            $nameErr = "Only Alpha numeric characters, period, dash and underscores are allowed";
            $name = test_input($_POST["name"]);
        }
        elseif(strlen($_POST["name"]) < 2 )
        {
            $nameErr = "Username must contain atleast two characters.";
            $name = test_input($_POST["name"]);
        }
        else
        {
            $name = test_input($_POST["name"]);
        }
        if(empty($_POST["pass"]))
        {
            $passErr = "Password is Required";
        }
        elseif(strlen($_POST["pass"]) < 8)
        {
            $passErr = "Password must contain at least 8 characters";
            $pass = test_input($_POST["pass"]);
        }
        elseif(preg_match("/[\$#@%]+/", $_POST["pass"]) == false)
        {
            $passErr = "Must contain at least one special character ($, %, #, @).";
            $pass = test_input($_POST["pass"]);
        }
        else
        {
            $pass = test_input($_POST["pass"]);
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
        <div><label class="label" for="name" > NAME:</label>
            <input type="text" id="name" name="name">
            <span class="error">* <?php echo $nameErr; ?></span></div>
        <div><label class="label" for="pass" > Password:</label>
             <input type="password" id="pass" name="pass">
             <span class="error">* <?php echo $passErr; ?></span></div>
        <input class="submit" type="submit" name="submit" value="Submit">
    </form><br><br>
    <h3 class="label">Your Input:</h3>
    <div class="submit">
    <?php
        echo "Name: " . $name."<br>";
        echo "Password: ".$pass."<br>";
    ?>
</body>
</html>
