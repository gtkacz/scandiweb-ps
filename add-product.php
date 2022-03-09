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
    <form method="post" action="add.php">
        <div class="title">
            <h2>Product Add</h2>
            <div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" onclick="history.go(-1);">Cancel</button>
            </div>
        </div>
        
		<hr>

        
            <label for="SKU">SKU</label>
            <input type="text" id="fsku" name="SKU"><br>

            <label for="Name">Name</label>
            <input type="text" id="fname" name="Name"><br>

            <label for="Price">Price</label>
            <input type="text" id="fprice" name="Price"><br>

            <label for="attr_name">Type Switcher</label>
            <select id="attr_name" name="attr_name">
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select><br>

            <label for="attr_value">Attribute Value</label>
            <input type="text" id="fattr_value" name="attr_value"><br>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>