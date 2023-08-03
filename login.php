<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>
<body>
    <div class="fullPage centerElement">
        <form method="post">
            <div class="userInput">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder=" " required>
            </div>
            <div class="userInput">
                <label for="password">Password</label>
                <input type="text" content="secured" name="password" id="password" required placeholder=" ">
                <input type="button" class="showPassword" value = "👁">
            </div>
            <input type="submit" value="Log in">
            <a href="">Forget Password</a>
        </form>
    </div>
</body>
<script src="StaticFiles/JS/ui.js"></script>
</html>
<?php
session_start();
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "myUsers");
    $hashedPassword = crypt($password, "K5X3");
    $query = "SELECT COUNT(*) as count FROM users u JOIN userpasswords p ON u.id = p.u_id WHERE u.username = '$username' AND p.password = '$hashedPassword'";
    
    $count = (($conn->query($query)) -> fetch_assoc())['count'];
    
    if ($count == 1) {
        $query = "SELECT u.id as id, d.fname as fname, d.lname as lname, d.email as email FROM users u JOIN userdatas d ON u.id = d.u_id WHERE u.username = '$username'";
        $result = ($conn->query($query)) -> fetch_assoc();
         
        $_SESSION["userName"] = $username;
        $_SESSION["id"]    = $result["id"];
        $_SESSION["fname"] = $result["fname"];
        $_SESSION["lname"] = $result["lname"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["isLoggedIn"] = true;
        header("Location: /Login/dashboard.php");
    } else {
        $_SESSION["isLoggedIn"] = false;
    }
}
?>