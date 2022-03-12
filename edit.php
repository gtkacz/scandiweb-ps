<?php
include ("db.php");

if(isset($_GET["SKU"], $_GET["type"])){
    $Type = $_GET["type"];
    $product = match($Type){
        'DVD' => DVD::getProduct($_GET['SKU']),
        'Book' => Book::getProduct($_GET['SKU']),
        'Furniture' => Furniture::getProduct($_GET['SKU']),
    };
} else{
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
	include ("partials/head.php");
	?>
<body>
    <div class="container">
    <form method="post" action="add.php" autocomplete="off" id="product_form">
        <div class="title">
            <h2>Product Add</h2>
            <div>
            <button type="submit" class="btn btn-success btn-size">Save</button>
            <button type="button" class="btn btn-danger btn-size" onclick="window.location.href='index.php'">Cancel</button>
            </div>
        </div>
        <center>
        <div class="card-edit">
            <input type="text" class="fake-input" id="sku" name="SKU" value=<?php echo $product->SKU ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <input type="text" class="fake-input" id="name" name="Name" value=<?php echo $product->NAME ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <input type="text" class="fake-input" pattern="[0-9]+" id="price" name="Price" value=<?php echo $product->PRICE ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <span><?php echo $product->productAttribute ?></span>
        </div>
        </center>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>