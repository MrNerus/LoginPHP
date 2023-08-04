<?php 
    require_once("initOnce.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>

<body>
    <div class="navBar">
        <a href="dashboard.php">Dashboard</a>
        <a href="logs.php">My Activities</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="fullPage centerElement">
        <form method="post">
            <div class="userInput">
                <label for="mode">dark Mode</label>
                <input type="checkbox" name="darkMode" id="darkMode">
                <div class="toggleOutline" dataToggle="off" dataFor="darkMode" onclick="toggle('darkMode')" >
                    <div class="toggleSlide"></div>
                </div>
            </div>
            <div class="userInput">
                <label for="fontSize">Font Size in px (default: 14)</label>
                <input type="text" name="fontSize" id="fontSize" placeholder=" ">
            </div>
            <input type="submit" value="Set">
        </form>
    </div>
</body>
<script src="StaticFiles/JS/ui.js"></script>
</html>
