<?php 
// session_start();
// if ($_SESSION['isLoggedIn'] != true) {
//     header("Location: /Login/login.php");
//     exit;
// }

// if (isset($_SESSION['darkMode']) != true) {$_SESSION['darkMode'] = "off";}
// if (isset($_SESSION['fontSize']) != true) {$_SESSION['fontSize'] = 14;}

// if(isset($_GET['get_session_values'])) {
//     $response = array(
//         'darkMode' => $_SESSION['darkMode'],
//         'fontSize' => $_SESSION['fontSize']
//     );
//     header('Content-Type: application/json');
//     echo json_encode($response);
//     exit();
// }

// if (isset($_POST)) {
//     if (isset($_POST['darkMode'])) {$_SESSION['darkMode'] = 'on';}
//     else {$_SESSION['darkMode'] = 'off';}
//     if (isset($_POST['fontSize']) && $_POST['fontSize'] != '') {$_SESSION['fontSize'] = $_POST['fontSize'];}
// }

session_start();

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $_SESSION['expire_time']) {
    // last request was more than 30 minutes ago
    $conn = new mysqli("localhost", "root", "", "myUsers");
    $uid = $_SESSION["id"];
    $query = "INSERT INTO userlogs (u_id, logType) VALUES ($uid, 'SE')"; // SE stands for Session Expired
    $conn->query($query);
    $conn->close();
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php");
    exit;
} else {
    $_SESSION['last_activity'] = time(); // update last activity time stamp
}

if ($_SESSION['isLoggedIn'] != true) {
    header("Location: login.php");
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

if ($_POST) {
    if (isset($_POST['darkMode'])) {
        $_SESSION['darkMode'] = $_POST['darkMode'] == 'on' ? 'on' : 'off';
    } else {
        $_SESSION['darkMode'] = 'off';
    }
    if (isset($_POST['fontSize']) && $_POST['fontSize'] != '') {
        $_SESSION['fontSize'] = $_POST['fontSize'];
    }
}
?>