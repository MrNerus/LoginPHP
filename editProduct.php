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
    <?php if ($_GET["pCode"]) {
        $conn = new mysqli("localhost", "root", "", "myUsers");
        $query = "SELECT * FROM stock_in WHERE item_Code = '".$_GET["pCode"]."';";
        $result = $conn->query($query);
        if ($result) {
            echo "<form method='post' enctype='multipart/form-data'>";
            echo "<h1>Delete and Update Product: ".$_GET["pCode"]."</h1>";
            while ($row = $result->fetch_assoc()) {
                echo "<input type='hidden' name='item_Code' value='".$row["item_Code"]."'/>" ;

                echo '<img src="'.$row["image"].'" alt="'.$row["item_name"].'" class="fullWidth aspectRatio1_1 overFlowHidden rounding fitCover"/>';

                echo '<div class="userInput">';
                echo '<label for="image">Change Image</label>';
                echo "<input type='file' name='image' id='image'>";
                echo '</div>';

                echo '<div class="userInput">';
                echo '<label for="item_name">Product Name</label>';
                echo '<input type="text" name="item_name" id="item_name" placeholder=" " value="'.$row["item_name"].'" required>';
                echo '</div>';
                
                echo '<div class="userInput">';
                echo '<label for="description">Description</label>';
                echo '<textarea name="description" id="description" placeholder=" " required rows=5 cols=50>'.$row["description"].'</textarea>';
                echo '</div>';

                echo '<div class="userInput">';
                echo '<label for="ppu">Price Per Unit</label>';
                echo '<input type="text" name="ppu" id="ppu" placeholder=" " value="'.$row["ppu"].'" required>';
                echo '</div>';

                echo '<div class="userInput">';
                echo '<label for="qty">Quantity</label>';
                echo '<input type="text" name="qty" id="qty" placeholder=" " value="'.$row["qty"].'" required>';
                echo '</div>';

                echo '<a href="deleteProduct.php?pCode='.$row["item_Code"].'">Delete Product</a>';
                echo '<input type="submit" value="Update">';
            }
            echo "</form>";
        }
        
        $conn->close();
    } 
    ?>
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

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $uploadFilePath = "";
    if (isset($_FILES['image'])) {
        $sysroot = "C:/Xampp/htdocs/Login/";
        $uploadDirectory = 'StaticFiles/imgs/';
        $customName = $_POST['item_Code'].'.jpg';

        $uploadFilePath = $uploadDirectory . $customName;

        if (file_exists($uploadFilePath)) {
            unlink($uploadFilePath);
        }

        // Move the uploaded file to the desired directory with the custom name
        move_uploaded_file($_FILES['image']['tmp_name'], $sysroot.$uploadFilePath);
    }


    $item_Code = $_POST['item_Code'];
    $item_name = $_POST['item_name'];
    $ppu = $_POST['ppu'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];
    $sql = "";
    if ($uploadFilePath == '') {
        $sql = "UPDATE stock_in SET item_name = '$item_name', qty = '$qty', ppu = '$ppu', description = '$description' WHERE item_Code = '$item_Code'";
    } else {
        $sql = "UPDATE stock_in SET item_name = '$item_name', qty = '$qty', ppu = '$ppu', description = '$description', image = '$uploadFilePath' WHERE item_Code = '$item_Code'";
    }

    $result = $conn->query($sql);

    $conn->close();
    header("Location: listProducts.php");
}
?>