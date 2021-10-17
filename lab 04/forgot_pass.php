<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        include 'head34.php';
        ?><br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <center><div><labelfor="email" > Email:</label>
        <input type="text" id="email" name="email"></div><br>
        <input class="submit" type="submit" name="submit" value="Submit"></center>
        </form><br>
        <div>
        <?php
        include 'foot34.php';
        ?>
        </div>
        
    </body>
</html>
