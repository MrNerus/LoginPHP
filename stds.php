<!DOCTYPE html>
<html>

<head>
    <title>Delete and Update Student</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>

<body>
    <div class="navBar">
        <a href="dashboard.php">Dashboard</a>
        <a href="logs.php">My Activities</a>
        <a href="add.php">Add student</a>
        <a href="update.php">Update student</a>
        <a href="logout.php">Logout</a>
    </div>

    <?php if ($Name) { ?>
        <form method="post">
            <h1>Delete and Update Student</h1>
            <input type="text" name="Name" placeholder="Name">
            <input type="text" name="Faculty" placeholder="Faculty">
            <input type="text" name="Semester" placeholder="Semester">
            <input type="text" name="Address" placeholder="Address">
            <input type="text" name="Phone_Number" placeholder="Phone Number">
        </form>

        <a href="?delete=true">Delete Student</a>
        <a href="?update=true">Update Student</a>
    <?php } else { ?>
        <p>Student not found.</p>
    <?php } ?>

</body>
<script src="StaticFiles/JS/ui.js"></script>

</html>
<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myusers";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student name from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // The `id` key is not present in the `$_GET` array
    echo "Please specify an `id` in the URL.";
}
// $id = $_GET['id'];

// Check if the user is trying to delete a student
if (isset($_GET['delete'])) {
    // Delete the student from the database
    $sql = "DELETE FROM student_information WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Redirect the user to the index page
        header("Location: dashboard.php");
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    // Check if the user is trying to update a student
    if (isset($_POST['update'])) {
        // Get the updated student information from the POST request
        $student_name = $_POST["Name"];
        $student_faculty = $_POST["Faculty"];
        $student_semester = $_POST["Semester"];
        $student_address = $_POST["Address"];
        $student_phonenumber = $_POST["Phone_Number"];

        // Update the student in the database
        $sql = "UPDATE INTO student_information (Name, Faculty, Semester,Address,Phone_Number) 
  VALUES ('$student_name', '$student_faculty', '$student_semester','$student_address','$student_phonenumber' WHERE id = $id)";
        // $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Redirect the user to the index page
            header("Location: dashboard.php");
        } else {
            echo "Error updating student: " . mysqli_error($conn);
        }
    }

    // Get the student information from the database
    $sql = "SELECT * FROM student_information WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Error getting student information: " . mysqli_error($conn);
    }
}

?>