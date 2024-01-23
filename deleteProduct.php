<?php 
require("initOnce.php")
?>

<?php 
if ($_GET) {
    $item_Code = $_GET["pCode"];
    $conn = new mysqli("localhost", "root", "", "myUsers");
    $query = "DELETE FROM stock_in WHERE item_Code='$item_Code';";
    $result = $conn->query($query);
    $conn->close();
    header("Location: listProducts.php");
}
?>