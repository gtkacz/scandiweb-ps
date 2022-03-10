<!DOCTYPE html>
<html lang="en">
<?php
	include ("partials/head.php");
	include ("db.php");

	$db = new Database();

	$sql = "SELECT * FROM `products` ORDER BY `SKU` ASC";
	$rows = $db->query($sql);
	?>
<body>
    <div class="container">
	<form method="post" action="delete.php">
        <div class="title">
            <h2>Product List</h2>
            <div>
				<button type="button" class="btn btn-success btn-size" onclick="window.location.href='add-product.php'">ADD</button>
				<button type="submit" class="btn btn-danger btn-size" value="delete" name="but_delete" id="delete-product-btn">MASS DELETE</button>
            </div>
        </div>
        
		<hr>

        <div class="row isotope-grid">
			<?php while($row = $rows->fetch_assoc()): ?>
				<div class="card hover-overlay hover-zoom hover-shadow ripple">
					<input type="checkbox" class="delete-checkbox" name="delete[]" value="<?= $row["SKU"] ?>" id="delete-checkbox">
					<span><?php echo $row["SKU"]; ?></span>
					<span><?php echo $row["NAME"]; ?></span>
					<span><?php echo "{$row["PRICE"]} $"; ?></span>
					<span><?php echo $row["ATTR_VALUE"]; ?></span>
				</div>
			<?php endwhile; ?>
        </div>
		</form>
		<?php include ("partials/footer.php"); ?>
	</div>
</body>
</html>