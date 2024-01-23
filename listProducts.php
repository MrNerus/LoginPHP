<?php 
require("initOnce.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
</head>
<style>

</style>

<body class="fullPage">
    <?php include 'nav.php' ?>
    <section class="fullPage isFlex flexCol alignCenter">
    <div class="userInput searchBar">
                <label for="searchInput">Search for Product</label>
                <input type="text" name="searchInput" id="searchInput" placeholder=" " onkeyup="linearSearch()">
                <!-- can contain alphabet and space.
                sorry XÆA-Xii -->
            </div>
        <table id="productTable">
            <tr>
                <th class='innerSpace1 borderBox'>Item Code</th>
                <th class='innerSpace1 borderBox'>Product Name</th>
                <th class='innerSpace1 borderBox'>QTY</th>
                <th class='innerSpace1 borderBox'>Price Per Unit</th>
                <th class='innerSpace1 borderBox'>Tweak</th>
            </tr>
            <?php 
            $conn = new mysqli("localhost", "root", "", "myUsers");
            $query = "SELECT `item_Code`, `item_name`, `qty`, `ppu` FROM stock_in";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='shadowOkHover rounding overFlowHidden transition' id='".$row["item_Code"]."'>";
                echo "<td class='innerSpace1 borderBox'>".$row["item_Code"]."</td>";
                echo "<td class='innerSpace1 borderBox'>".$row["item_name"]."</td>";
                echo "<td class='innerSpace1 borderBox'>".$row["qty"]."</td>";
                echo "<td class='innerSpace1 borderBox'>".$row["ppu"]."</td>";
                echo "<td class='innerSpace1 borderBox'><a class='neutral innerSpaceVerticalHalf innerSpaceHorizontalHalf  cursorPointer' href='editProduct.php?pCode=".$row["item_Code"]."'><span class='material-symbols-outlined'>settings</span></td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
        
    </section>

</body>
<script src="StaticFiles/JS/ui.js"></script>
<script src="StaticFiles/JS/dashboard.js"></script>
</html>
