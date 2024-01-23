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

<div class="fullScreen isFlex flexCol gap1 alignCenter justifyCenter innerSpace1">
    <form method='post'>
        <h1>Add Product: </h1>

        <input type='hidden' name='type' id='type' value='add'/>

        <div class="userInput">
        <label for="product">Select Product</label>
        <select name="product" id="product" required>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myusers";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
            
            $sql = "SELECT item_Code, item_name FROM stock_in;";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["item_Code"].'">'.$row["item_Code"].' : '.$row["item_name"].'</option>';
                }
            }

            $conn->close();
            ?>

        </select>
        </div>

        <div class="userInput">
        <label for="qty">Quantity</label>
        <input type="text" name="qty" id="qty" placeholder=" " required>
        </div>

        <input type="submit" value="Save">
            
    </form>
    <form method='post'>
        <h1>Drop Product: </h1>

        <input type='hidden' name='type' id='type' value='drop'/>

        <div class="userInput">
        <label for="product">Select Product</label>
        <select name="product" id="product" required>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myusers";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
            
            $sql = "SELECT item_Code, item_name FROM stock_in;";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["item_Code"].'">'.$row["item_Code"].' : '.$row["item_name"].'</option>';
                }
            }

            $conn->close();
            ?>

        </select>
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


    $item_Code = $_POST['product'];
    $qty = $_POST['qty'];
    $type = $_POST['type'];
    $sql = "";
    if ($type == 'drop') { $sql = "UPDATE stock_in SET qty = qty - $qty WHERE item_Code = $item_Code;"; }
    else { $sql = "UPDATE stock_in SET qty = qty + $qty WHERE item_Code = $item_Code;"; }


    $result = $conn->query($sql);

    $conn->close();
    header("Location: listProducts.php");
}