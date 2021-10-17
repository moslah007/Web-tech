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
        <?php
        include 'head34.php';
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div><label class="label" for="name" > User Name:</label>
            <input type="text" id="name" name="name">
            <div><label class="label" for="pass" > Password:</label>
            <input type="password" id="pass" name="pass"></div>
            <input class="submit" type="checkbox" id="remember" name="remember" value="remember">
            <label for="remember"> Remember Me</label></div>
            <input class="submit" type="submit" name="submit" value="Submit">
            <a href="/lab%2004/forgot.php">Forgot Password?</a>
        </form><br><br>
        <div>
        <?php
        include 'foot34.php';
        ?>
        </div>
        
    </body>
</html>
