<?php 
// require("initOnce.php")
?>
<?php 
session_start();
if ($_SESSION['isLoggedIn'] != true) {
    header("Location: /Login/login.php");
    exit;
}

if (!isset($_SESSION['darkMode'])) {$_SESSION['darkMode'] = "off";}
if (!isset($_SESSION['fontSize'])) {$_SESSION['fontSize'] = 14;}

if(isset($_GET['get_session_values'])) {
    $response = array(
        'darkMode' => $_SESSION['darkMode'],
        'fontSize' => $_SESSION['fontSize']
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

if (isset($_POST)) {
    if (isset($_POST['darkMode'])) {
        $_SESSION['darkMode'] = $_POST['darkMode'] == 'on' ? 'on' : 'off';
    }
    if (isset($_POST['fontSize']) && $_POST['fontSize'] != '') {
        $_SESSION['fontSize'] = $_POST['fontSize'];
    }
}
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
    <a href="dashboard.php">Dashboard</a>
    <form method="post">
        <div class="userInput">
            <label for="mode">dark Mode</label>
            <input type="checkbox" name="darkMode" id="darkMode">
            <div class="toggleOutline" dataToggle="off" dataFor="darkMode" onclick="toggle('darkMode')" >
                <div class="toggleSlide"></div>
            </div>
        </div>
        <div class="userInput">
            <label for="fontSize">Font Size (relative to 14 px)</label>
            <input type="text" name="fontSize" id="fontSize" placeholder=" ">
        </div>
        <input type="submit" value="Set">
    </form>
</body>
<script src="StaticFiles/JS/ui.js"></script>
</html>
