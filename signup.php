<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>
<body>
    <div class="fullPage centerElement">
        <form method="post">
            <div class="userInput">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" placeholder=" " required pattern="^[a-zA-Z\\s]*$">
                <!-- can contain alphabet and space.
                sorry XÆA-Xii -->
            </div>
            <div class="userInput">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" placeholder=" " required pattern="^[a-zA-Z\\s]*$">
            </div>
            <div class="userInput">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder=" " required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                <!-- The email address must start with one or more letters, digits, underscores, percent signs, plus signs or hyphens.
                must contain an at symbol (@).
                The domain name must contain one or more letters, digits, hyphens or dots.
                The domain name must end with a period (.) followed by two or more letters. -->
            </div>
            <div class="userInput">
                <label for="phno">Phone Number (eg: +9779876543210)</label>
                <input type="text" name="phno" id="phno" placeholder=" " required pattern=".*">
                <!-- Valid entries:
                "123 456 7890 until 6pm, then 098 765 4321"  
                "123 456 7890 or try my mobile on 098 765 4321"  
                "ex-directory - mind your own business" -->
            </div>
            <div class="userInput">
                <label for="dob">DOB (YYYY-MM-DD AD)</label>
                <input type="text" name="dob" id="dob" placeholder=" " required pattern="^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$">
            </div>
            <div class="userInput">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" placeholder=" " required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="userInput">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder=" " required pattern="/^[a-zA-Z0-9_-]{4,16}$/">
                <!-- 4 to 16 character long, can have hyphen, can have underscore, can have ascci character, nothing else -->
            </div>
            <div class="userInput">
                <label for="password">Password</label>
                <input type="text" content="secured" name="password" id="password" required placeholder=" " pattern="/^(?=.*[0-9@&#$?!|(){}[\]]){2,}(?=.*[a-zA-Z]).{8,}$/">
                <input type="button" class="showPassword" value = "👁">
            </div>
            <div class="userInput">
                <label for="cpassword">Confirm Password</label>
                <input type="text" content="secured" name="cpassword" id="cpassword" required placeholder=" " pattern="/^(?=.*[0-9@&#$?!|(){}[\]]){2,}(?=.*[a-zA-Z]).{8,}$/">
                <!-- Minimum 8 characters in total. At least two letters. At least two digits. At least two symbols. -->
                <input type="button" class="showPassword" value = "👁">
            </div>
            <input type="submit" value="Signup">
            <a href="login.php">Already have an account?</a>
        </form>
    </div>
</body>
<script src="StaticFiles/JS/ui.js"></script>

</html>
<?php
    if ($_POST) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password != $cpassword) {
            echo "Password not matched..";
        } else {
            $conn = new mysqli("localhost", "root", "", "myUsers");
            if (($conn -> query("SELECT 1 FROM users WHERE username = '$username'"))-> num_rows > 0) {
                echo("User Already Exist");
            } else {
                // $a = $conn -> execute_query("INSERT INTO users (username) VALUES ('$username')");
                // $uid = (($conn -> query("SELECT id FROM users WHERE username = '$username'")) -> fetch_assoc())['id'];
                // $hashedPassword = crypt($password, "K5X3");
                // $b = $conn -> execute_query("INSERT INTO userpasswords (u_id, password) VALUES ('$uid', '$hashedPassword')");
                // $c = $conn -> execute_query("INSERT INTO userDatas (u_id, fname, lname, email, phno, dob, gender) VALUES ('$uid', '$fname', '$lname', '$email', '$phno', '$dob', '$gender')");


                $conn->autocommit(FALSE);
                $result = $conn->query("SELECT id FROM users WHERE username = '$username'");
                if($result->num_rows > 0) {
                    echo "Username already taken";
                    $conn->rollback();
                    return;
                }

                $a = $conn->query("INSERT INTO users (username) VALUES ('$username')");
                if(!$a) {
                    echo "Failed to insert into users: (" . $conn->errno . ") " . $conn->error;
                    $conn->rollback();
                    return;
                }

                $uid = (($conn->query("SELECT id FROM users WHERE username = '$username'"))->fetch_assoc())['id'];

                $hashedPassword = crypt($password, "K5X3");
                $b = $conn->query("INSERT INTO userpasswords (u_id, password) VALUES ('$uid', '$hashedPassword')");
                if(!$b) {
                    echo "Failed to insert into userpasswords: (" . $conn->errno . ") " . $conn->error;
                    $conn->rollback();
                    return;
                }

                $c = $conn->query("INSERT INTO userDatas (u_id, fname, lname, email, phno, dob, gender) VALUES ('$uid', '$fname', '$lname', '$email', '$phno', '$dob', '$gender')");
                if(!$c) {
                    echo "Failed to insert into userDatas: (" . $conn->errno . ") " . $conn->error;
                    $conn->rollback();
                    return;
                }

                $conn->commit();
                header("Location: login.php");
            }
            $conn -> close();
        }
    }
?>