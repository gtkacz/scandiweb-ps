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
    <form method="post" action="add.php" autocomplete="off">
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
                <input type="text" id="fsku" name="SKU"><br>
            </div>

            <div class="form-item">
                <label for="Name">Name</label>
                <input type="text" id="fname" name="Name"><br>
            </div>

            <div class="form-item">
                <label for="Price">Price</label>
                <input type="text" id="fprice" name="Price"><br>
            </div>

            <div class="form-item">
                <label for="attr_name">Type Switcher</label>
                <select id="attr_name" name="attr_name" class="div-toggle" data-target=".dynamic-show">
                    <option value="DVD" data-show=".dvd">DVD</option>
                    <option value="Furniture" data-show=".furniture">Furniture</option>
                    <option value="Book" data-show=".book">Book</option>
                </select><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="attr_value" class="dvd hide">Size (MB)</label>
                <input type="text" id="fattr_value" name="attr_value" class="dvd hide"><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="attr_value" class="book hide">Weight (KG)</label>
                <input type="text" id="fattr_value" name="attr_value" class="book hide"><br>
            </div>

            <div class="dynamic-show form-item">
                <label for="attr_value" class="furniture hide">Height (CM)</label>
                <input type="text" id="fattr_value" name="attr_value" class="furniture hide"><br>
            </div>
            <div class="dynamic-show form-item">
                <label for="attr_value" class="furniture hide">Width (CM)</label>
                <input type="text" id="fattr_value" name="attr_value" class="furniture hide"><br>
            </div>
            <div class="dynamic-show form-item">
                <label for="attr_value" class="furniture hide">Length (CM)</label>
                <input type="text" id="fattr_value" name="attr_value" class="furniture hide"><br>
            </div>
        </div>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>