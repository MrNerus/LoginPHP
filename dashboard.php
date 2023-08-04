<?php 
require("initOnce.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
    <link rel="stylesheet" href="StaticFiles/CSS/dashboard.css">
</head>
<style>

</style>

<body class="Container">
    <div class="navBar">
        <a href="up.php">User Preference</a>
        <a href="logs.php">My Activities</a>
        <a href="logout.php">Logout</a>
    </div>
    <section class="Container Center_on_Flex">


        <p id="Generated" class="Space">Something here</p>
        <input type="button" value="Generate" onclick="Ask_For_Card()" class="Button_Links Space">
    </section>

</body>
<script src="StaticFiles/JS/ui.js"></script>
<script src="StaticFiles/JS/dashboard.js"></script>
</html>
