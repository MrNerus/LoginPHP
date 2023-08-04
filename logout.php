<?php 
session_start();
if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) {
    $conn = new mysqli("localhost", "root", "", "myUsers");
    $uid = $_SESSION["id"];
    $query = "INSERT INTO userlogs (u_id, logType) VALUES ($uid, 'LO')"; // LO stands for Logged Out
    $conn->query($query);
    $conn->close();
    session_unset();
    session_destroy();
}
header("Location: login.php");
?>