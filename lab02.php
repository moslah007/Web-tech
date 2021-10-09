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
            .textbox
            {
                width: 40px;
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
    $name = $email = $birthday = $gender = $bgroup = "";
    $mail1 = $dob = $gen = $bg = "";
    $deg = $degree = array();

    $nameErr = $emailErr = $birthdayErr = $genderErr = $degreeErr = $bgroupErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(empty($_POST["name"]))
        {
            $nameErr = "Name is Required";
        }
        elseif(!preg_match("/^[a-zA-z .-]+$/", $_POST["name"]))
        {
            $nameErr = "Name must start with a letter.";
            $name = test_input($_POST["name"]);
        }
        elseif(!preg_match("/^[a-zA-Z .-]*$/", $_POST["name"]))
        {
            $nameErr = "Only Letters and white spaces are allowed";
            $name = test_input($_POST["name"]);
        }
        elseif(str_word_count($_POST["name"]) < 2)
        {
            $nameErr = "Name must inlclude Firstname and Lastname.";
            $name = test_input($_POST["name"]);
        }
        else
        {
            $name = test_input($_POST["name"]);
        }

        if(empty($_POST["email"]))
        {
            $emailErr = "Email is Required";
        }
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Invalid email format";
            $email = test_input($_POST["email"]);
        }
        else
        {
            $email = test_input($_POST["email"]);
        }
        
        if(empty($_POST["birthday"]))
        {
            $birthdayErr = "Date of birth is Required";
        }
        elseif(($_POST["birthday"] < date("Y-M-d",mktime(0,0,0,1,1,1953))) || ($_POST["birthday"] > date("Y-M-d",mktime(0,0,0,1,1,1998))))
        {
            $birthdayErr = "Birth Year must be between 1953-1998";
            $birthday = test_input($_POST["birthday"]);
        }
        else
        {
            $birthday = test_input($_POST["birthday"]);
        }

        if(empty($_POST["gender"]))
        {
            $genderErr = "Gender is Required";
        }
        else
        {
            $gender = test_input($_POST["gender"]);
        }

        if(count($_POST["checkbox"]) <= 2)
        {
            $degreeErr = "Select at least 2 degrees.";
            $degree = $_POST["checkbox"];
        }
        else
        {
            $degree = $_POST["checkbox"];
        }

        if($_POST["bgroup"] == "blank")
        {
            $bgroupErr = "Blood group is required.";
        }
        else
        {
            $bgroup = test_input($_POST["bgroup"]);
        }
        if(isset($_POST['email1']))
        {
            $mail1 = $_POST['email1'];
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
    <div class="error">* marked fields are mandatory</div>
    <h3 class="label">PHP without Validation:</h3><br><br><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div><label class="label" for="email1" >1. EMAIL:</label>
            <input type="text" id="email1" name="email1"> </div>
        <div><label class="label" for="birthday1">2. DATE OF BIRTH:</label>
            <input type="date" id="birthday1" name="birthday1"></div>
        <div>
            <label class="label" for="gender1">3. GENDER:</label>
            <input type="hidden" name="gender1" value="">
            <input type="radio" name="gender1" value="female">Female
            <input type="radio" name="gender1" value="male">Male
            <input type="radio" name="gender1" value="other">Other
        </div>
        <div>
            <label class="label">4. DEGREE:</label>
            <input type="hidden" name="checkbox1[]" value="">
            <input type="checkbox" name="checkbox1[]" value="ssc">
            <label> SSC</label>
            <input type="checkbox" name="checkbox1[]" value="hsc">
            <label> HSC</label>
            <input type="checkbox" name="checkbox1[]" value="bsc">
            <label> BSc</label>
            <input type="checkbox" name="checkbox1[]" value="msc">
            <label> MSc</label>
        </div>
        <div><label class="label" for="bgroup1">5. BLOOD GROUP:</label>
            <select id="bgroup1" name="bgroup1">
                <option value=" "> </option>
                <option value="apos">A+</option>
                <option value="aneg">A-</option>
                <option value="bpos">B+</option>
                <option value="bneg">B-</option>
                <option value="opos">O+</option>
                <option value="oneg">O-</option>
                <option value="abpos">AB+</option>
                <option value="abneg">AB-</option>
            </select>
        </div><br><br><br>

        <h3 class="label">PHP with Validation:</h3><br><br><br>
        <div><label class="label" for="name" >6. NAME:</label>
             <input type="text" id="name" name="name">
             <span class="error">* <?php echo $nameErr; ?></span></div>
        <div><label class="label" for="email" >7. EMAIL:</label>
             <input type="text" id="email" name="email">
             <span class="error">* <?php echo $emailErr; ?></span></div> 
        <div><label class="label" for="birthday">8. DATE OF BIRTH:</label>
            <input type="date" id="birthday" name="birthday">
            <span class="error">* <?php echo $birthdayErr;?></span></div>
        <div>
            <label class="label" for="gender">9. GENDER:</label>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="other">Other
            <span class="error">* <?php echo $genderErr;?></span>
        </div>
        <div>
                <label class="label" for="degree" >10. DEGREE:</label>
                <input type="hidden" name="checkbox[]" value="">
                <input type="checkbox" name="checkbox[]" value="ssc">
                <label> SSC</label>
                <input type="checkbox" name="checkbox[]" value="hsc">
                <label> HSC</label>
                <input type="checkbox" name="checkbox[]" value="bsc">
                <label> BSc</label>
                <input type="checkbox" name="checkbox[]" value="msc">
                <label> MSc</label>
                <span class="error">* <?php echo $degreeErr;?></span>
        </div>
        <div><label class="label" for="bgroup">11. BLOOD GROUP:</label>
            <select id="bgroup" name="bgroup">
                <option value="blank"> </option>
                <option value="apos">A+</option>
                <option value="aneg">A-</option>
                <option value="bpos">B+</option>
                <option value="bneg">B-</option>
                <option value="opos">O+</option>
                <option value="oneg">O-</option>
                <option value="abpos">AB+</option>
                <option value="abneg">AB-</option>
            </select>
            <span class="error">* <?php echo $bgroupErr;?></span>
        </div>
        <input class="submit" type="submit" name="submit" value="Submit">
    </form><br><br>
    <h3 class="label">Your Input:</h3>
    <div class="submit">
    <?php
        echo "(without validation)"."<br>";
        echo "Email: " . $mail1."<br>";
        echo "Date of Birth: ".$_POST["birthday1"]."<br>";
        echo "Gender: " . $_POST["gender1"]."<br>";
        echo "Degree: ";
        foreach($_POST["checkbox1"] as $value)
            {
                echo $value . " ";
            }
        echo "<br>";
        echo "B. Group: ".$_POST['bgroup1']."<br><br>";

        echo "(with validation)"."<br>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Date of Birth: ".$birthday."<br>";
        echo "Degree: ";
        if(!empty($degree))
        {
            foreach($degree as $val)
            {
                echo $val . " ";
            }
        }
        echo "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "B. Group: " . $bgroup;
        ?>
    </div>
</body>
</html>