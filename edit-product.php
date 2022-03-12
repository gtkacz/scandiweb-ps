<?php
include ("docs/classes.php");

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
    <form method="post" action="edit" autocomplete="off" id="product_form">
        <div class="title">
            <h2>Product Add</h2>
            <div>
            <button type="submit" class="btn btn-success btn-size">Save</button>
            <button type="button" class="btn btn-danger btn-size" onclick="window.location.href='index'">Cancel</button>
            </div>
        </div>
        <center>
        <div class="card-edit">
            <input type="text" class="fake-input" placeholder="Edit SKU" id="sku" name="SKU" value=<?php echo $product->SKU ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <input type="text" class="fake-input" placeholder="Edit name" id="name" name="Name" value=<?php echo $product->NAME ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <input type="text" class="fake-input" placeholder="Edit price" pattern="[0-9]+" id="price" name="Price" value=<?php echo $product->PRICE ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
            <input type="hidden" id="productType" name="productType" value=<?php echo $product->productType ?> required><br>
            <input type="hidden" id="oldSKU" name="oldSKU" value=<?php echo $product->SKU ?> required><br>
            <input type="text" class="fake-input" placeholder="Edit attribute" id="productAttribute" name="productAttribute" value=<?php echo $product->productAttribute ?> oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" required><br>
        </div>
        </center>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>