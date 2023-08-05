<?php 
    require_once("initOnce.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Activities</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
    <link rel="stylesheet" href="StaticFiles/CSS/logs.css">
</head>
<body>
    <div class="navBar">
        <a href="dashboard.php">Dashboard</a>
        <a href="logs.php">My Activities</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="fullPage centerElement">
        <ul class="noStyle">
            <?php 
                $conn = new mysqli("localhost", "root", "", "myUsers");
                $uid = $_SESSION["id"];
                $query = "SELECT logType, logTimeStamp FROM userlogs WHERE u_id = $uid ORDER BY id DESC LIMIT 200";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    $logMessage = "";
                    if     ($row["logType"] == "SE") { $logMessage = "Session Expired at "; }
                    elseif ($row["logType"] == "LO") { $logMessage = "Logged Out at "; }
                    elseif ($row["logType"] == "LI") { $logMessage = "Logged In at "; }
                    $logMessage = $logMessage.$row["logTimeStamp"];
                    echo "<li>$logMessage</li>";
                }
                $conn->close();
            ?>
        </ul>
    </div>
</body>
<script src="StaticFiles/JS/ui.js"></script>
</html>