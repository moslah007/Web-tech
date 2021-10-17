<!DOCTYPE html>
<html>
    <head>  
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
            <h3>Profile Picture:</h3><br>
            <img src="person.png" alt><br>
            <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload"><br><hr>
            <input type="submit" value="Upload Image" name="submit">
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
