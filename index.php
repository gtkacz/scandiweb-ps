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
        <div class="title">
            <h2>Product List</h2>
            <div>
				<button type="button" class="btn btn-success" onclick="window.location.href='addproduct.php'">Add</button>
				<button type="button" class="btn btn-danger">Mass Delete</button>
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
		<?php include ("partials/footer.php"); ?>
	</div>
</body>
</html>