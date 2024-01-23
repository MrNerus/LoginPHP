<?php 
require("initOnce.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="StaticFiles/CSS/root.css">
    <link rel="stylesheet" href="StaticFiles/CSS/utility.css">
    <link rel="stylesheet" href="StaticFiles/CSS/dashboard.css">
</head>
<style>

</style>
<body class="fullScreen">
<?php include 'nav.php' ?>
<section class="fullScreen innerSpace1 isFlex alignCenter justifyCenter flexCol gap1">
    <div class="shadowNotOk rounding innerSpace1 isFlex flexCol gap1">
        <h1>Low on Stock</h1>
        <table>
            <tr>
                <th class="innerSpace1 borderBox">Product ID</th>
                <th class="innerSpace1 borderBox">Product Name</th>
                <th class="innerSpace1 borderBox">Quantity</th>
            </tr>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myusers";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT item_Code, item_name, qty FROM stock_in WHERE qty <= 30";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="shadowOkHover rounding overFlowHidden transition">';
                    echo '<td class="innerSpace1 borderBox">'.$row['item_Code'].'</td>';
                    echo '<td class="innerSpace1 borderBox">'.$row['item_name'].'</td>';
                    echo '<td class="innerSpace1 borderBox">'.$row['qty'].'</td>';
                    echo '</tr>';
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
    <div class="shadowNotOk rounding innerSpace1 isFlex flexCol gap1">
        <h1>Overflow on Stock</h1>
        <table>
            <tr>
                <th class="innerSpace1 borderBox">Product ID</th>
                <th class="innerSpace1 borderBox">Product Name</th>
                <th class="innerSpace1 borderBox">Quantity</th>
            </tr>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myusers";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT item_Code, item_name, qty FROM stock_in WHERE qty >= 500";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="shadowOkHover rounding overFlowHidden transition">';
                    echo '<td class="innerSpace1 borderBox">'.$row['item_Code'].'</td>';
                    echo '<td class="innerSpace1 borderBox">'.$row['item_name'].'</td>';
                    echo '<td class="innerSpace1 borderBox">'.$row['qty'].'</td>';
                    echo '</tr>';
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
</section>
</body>
<script src="StaticFiles/JS/ui.js"></script>
</html>
