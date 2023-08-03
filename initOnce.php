<?php 
session_start();
if ($_SESSION['isLoggedIn'] != true) {
    header("Location: /Login/login.php");
    exit;
}

if (isset($_SESSION['darkMode']) != true) {$_SESSION['darkMode'] = "off";}
if (isset($_SESSION['fontSize']) != true) {$_SESSION['fontSize'] = 14;}

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
    if (isset($_POST['darkMode'])) {$_SESSION['darkMode'] = 'on';}
    else {$_SESSION['darkMode'] = 'off';}
    if (isset($_POST['fontSize']) && $_POST['fontSize'] != '') {$_SESSION['fontSize'] = $_POST['fontSize'];}
}
?>