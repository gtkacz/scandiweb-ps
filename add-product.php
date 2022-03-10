<!DOCTYPE html>
<html lang="en">
<?php
	include ("partials/head.php");
	include ("db.php");

	$sql = "select * from products";
	$rows = $db->query($sql);

	?>
<body>
    <div class="container">
    <form method="post" action="add.php" autocomplete="off" id="product_form">
        <div class="title">
            <h2>Product Add</h2>
            <div>
            <button type="submit" class="btn btn-success btn-size">Save</button>
            <button type="button" class="btn btn-danger btn-size" onclick="history.go(-1);">Cancel</button>
            </div>
        </div>
        
		<hr>
        
        <div class="form">
            <div class="form-item">
                <label for="SKU">SKU</label>
                <input type="text" id="sku" name="SKU"><br>
            </div>

            <div class="form-item">
                <label for="Name">Name</label>
                <input type="text" id="name" name="Name"><br>
            </div>

            <div class="form-item">
                <label for="Price">Price</label>
                <input type="text" id="price" name="Price"><br>
            </div>

            <div class="form-item">
                <label for="productType">Type Switcher</label>
                <select id="productType" name="productType" class="div-toggle" data-target=".dynamic-show">
                    <option value="DVD" data-show=".dvd">DVD</option>
                    <option value="Furniture" data-show=".furniture">Furniture</option>
                    <option value="Book" data-show=".book">Book</option>
                </select><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="size" class="dvd hide">Size (MB)</label>
                <input type="text" id="size" name="size" class="dvd hide">
                <span class="description dvd hide">* Please provide the size of the contents of the CD in megabytes.</span><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="weight" class="book hide">Weight (KG)</label>
                <input type="text" id="weight" name="weight" class="book hide">
                <span class="description book hide">* Please provide the weight of the book in kilograms.</span><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="height" class="furniture hide">Height (CM)</label>
                <input type="text" id="height" name="height" class="furniture hide">
            </div>
            <div class="dynamic-show form-item">
                <label for="width" class="furniture hide">Width (CM)</label>
                <input type="text" id="width" name="width" class="furniture hide">
            </div>
            <div class="dynamic-show form-item">
                <label for="length" class="furniture hide">Length (CM)</label>
                <input type="text" id="length" name="length" class="furniture hide">
                <span class="description furniture hide">* Please provide the dimensions of the piece of furniture in centimeters.</span><br>
            </div>
        </div>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>