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
            <h3>Change Password</h3>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div><label class="label" for="currpass" >Current Password:</label>
            <input type="password" id="currpass" name="currpass">
            <div><label class="label" for="pass" ><font color = "green"> New Password: </font></label>
             <input type="password" id="pass" name="pass">
            <div><label class="label" for="newpass" ><font color = "red"> Retype New Password: </font></label>
             <input type="password" id="newpass" name="newpass">
            <input class="submit" type="submit" name="submit" value="Submit">
    </form><br><br>
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
