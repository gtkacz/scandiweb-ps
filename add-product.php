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

        <div class="form">
            <div>
                <label for="SKU">SKU</label>
                <input type="text" id="fsku" name="SKU"><br>
            </div>

            <div>
                <label for="Name">Name</label>
                <input type="text" id="fname" name="Name"><br>
            </div>

            <div>
                <label for="Price">Price</label>
                <input type="text" id="fprice" name="Price"><br>
            </div>

            <div>
                <label for="attr_name">Type Switcher</label>
                <select id="attr_name" name="attr_name" class="div-toggle" data-target=".my-info-1">
                    <option value="DVD" data-show=".one">DVD</option>
                    <option value="Furniture" data-show=".one">Furniture</option>
                    <option value="Book" data-show=".three">Book</option>
                </select><br>
            </div>

            <div class="my-info-1">
                <label for="attr_value" class="one hide">Attribute Value</label>
                <input type="text" id="fattr_value" name="attr_value" class="one hide"><br>
            </div>

            <div class="my-info-1">
                <label for="attr_value" class="three hide">Attribute Value</label>
                <input type="text" id="fattr_value" name="attr_value" class="three hide"><br>
            </div>

            <div class="my-info-1">
                <label for="attr_value" class="three hide">Attribute Value</label>
                <input type="text" id="fattr_value" name="attr_value" class="three hide"><br>
            </div>
        </div>
        </form>
        <?php include ("partials/footer.php"); ?>
    </div>
</body>
</html>