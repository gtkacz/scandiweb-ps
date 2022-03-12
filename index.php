<!DOCTYPE html>
<html lang="en">
<?php
	include ("partials/head.php");
	include ("docs/classes.php");

	$allDVD = DVD::getProducts();
	$allBook = Book::getProducts();
	$allFurniture = Furniture::getProducts();
	$allProducts = array_merge($allDVD, $allBook, $allFurniture);

	$results = "";

	foreach($allProducts as $row){
		$results .= '<div class="card hover-overlay hover-zoom hover-shadow ripple">
						<input type="checkbox" class="delete-checkbox" name="delete[]" row='.$row->SKU.' id="delete-checkbox">
						<a href="edit-product?SKU='.$row->SKU.'&type='.$row->productType.'">
							<img alt="Edit listing" src="img/edit_black_24dp.svg" class="edit-content">
                        </a>
						<span>'.$row->SKU.'</span>
						<span>'.$row->NAME.'</span>
						<span>'.$row->PRICE.' $</span>
						<span>'.$row->attributeString().'</span>
					</div>';
	}
	?>
<!-- <body class="bg-dark text-light"> -->
<body>
    <div class="container">
	<form method="post" action="delete">
        <div class="title">
            <h2>Product List</h2>
            <div>
				<button type="button" class="btn btn-success btn-size" onclick="window.location.href='add-product'">ADD</button>
				<button type="submit" class="btn btn-danger btn-size" value="delete" name="but_delete" id="delete-product-btn">MASS DELETE</button>
            </div>
        </div>
        
		<hr>

        <div class="row isotope-grid">
			<?=$results?>
        </div>
		</form>
		<?php include ("partials/footer.php"); ?>
	</div>
</body>
</html>