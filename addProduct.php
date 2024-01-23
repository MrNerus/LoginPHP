<?php 
require("initOnce.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>

<body>
<?php include 'nav.php' ?>

<div class="fullScreen isFlex alignCenter justifyCenter innerSpace1">
    <form method='post' enctype='multipart/form-data'>
        <h1>Add Product: </h1>

        <div class="userInput">
        <label for="item_name">Product Name</label>
        <input type="text" name="item_name" id="item_name" placeholder=" " required>
        </div>

        <div class="userInput">
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder=" " required rows=5 cols=50></textarea>
        </div>

        <div class="userInput">
        <label for="ppu">Price Per Unit</label>
        <input type="text" name="ppu" id="ppu" placeholder=" " required>
        </div>

        <div class="userInput">
        <label for="qty">Quantity</label>
        <input type="text" name="qty" id="qty" placeholder=" " required>
        </div>

        <input type="submit" value="Save">
            
    </form>
</div>

    

</body>
<script src="StaticFiles/JS/ui.js"></script>

</html>
<?php
if ($_POST) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myusers";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }


    $item_name = $_POST['item_name'];
    $ppu = $_POST['ppu'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];
    $sql = "INSERT INTO stock_in (item_name, qty, ppu, description) VALUES ('$item_name', '$qty', '$ppu', '$description')";



    $result = $conn->query($sql);

    $conn->close();
    header("Location: listProducts.php");
}
?>