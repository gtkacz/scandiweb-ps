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
        <div style="display: flex; justify-content: space-between; margin-top: 100 px; align-items:center;">
            <h2>Product list</h2>
            <div>
				<button type="button" class="btn btn-success" id="add-product-btn" onclick="window.location.href='addproduct.php'">Add</button>
				<button type="button" class="btn btn-danger" id="delete-product-btn">Mass Delete</button>
</script>
            </div>
        </div>
        
		<hr>

        <div class="row isotope-grid">
			<?php while($row = $rows->fetch_assoc()): ?>
				<div class="card">
					<input type="checkbox" class="delete-checkbox">
					<span><?php echo $row["SKU"]; ?></span>
					<span><?php echo $row["NAME"]; ?></span>
					<span><?php echo $row["PRICE"]; ?></span>
					<span><?php echo $row["ATTR_VALUE"]; ?></span>
				</div>
			<?php endwhile; ?>
        </div>
    </div>
</body>
</html>