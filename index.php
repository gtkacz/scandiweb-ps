<?php
require_once("vendor/autoload.php");

include("resources/views/partials/head.php");

use App\models\Book;
use App\models\DVD;
use App\models\Furniture;

$allDVD = DVD::getProducts();
$allBook = Book::getProducts();
$allFurniture = Furniture::getProducts();
$allProducts = array_merge($allDVD, $allBook, $allFurniture);
array_multisort(array_column($allProducts, 'SKU'), SORT_ASC, SORT_NATURAL | SORT_FLAG_CASE, $allProducts);

$results = "";

foreach ($allProducts as $row) {
    $results .= '<div class="card hover-overlay hover-zoom hover-shadow ripple">
						<input type="checkbox" onchange="check_active()" class="delete-checkbox" name="delete[]" value=' . $row->getSlug("SKU") . '&' . $row->productType . ' id="delete-checkbox">
						<a href="resources/views/edit-product?SKU=' . $row->getSlug("SKU") . '&type=' . $row->productType . '">
							<img alt="Edit listing" src="resources/images/edit_black_24dp.svg" class="edit-content">
                        </a>
						<span>' . $row->SKU . '</span>
						<span>' . $row->Name . '</span>
						<span>' . $row->Price . ' $</span>
						<span>' . $row->attributeString() . '</span>
					</div>';
}
?>
<body>
<div class="container">
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <div class="title">
            <h2>Product List</h2>
            <div>
                <button type="button" class="btn btn-success btn-size" onclick="window.location.href='resources/views/add-product'">
                    ADD
                </button>
                <button type="submit" class="btn btn-danger btn-size" value="delete" name="but_delete"
                        id="delete-product-btn" disabled>MASS DELETE
                </button>
            </div>
        </div>

        <hr>

        <div class="row isotope-grid main-grid">
            <?= $results ?>
        </div>
    </form>
</div>
<?php
if (isset($_POST['but_delete'])) {
    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteid) {
            $separate = explode("&", $deleteid);
            $SKU = $separate[0];
            $SKU = str_replace('+', ' ', $SKU);
            $SKU = "'$SKU'";
            $productType = $separate[1];
            $className = "App\\models\\$productType";

            $productDelete = call_user_func([$className, 'getProduct'], $SKU);

            $productDelete->remove();
        }
    header("Refresh:0");
    }
}
?>
<?php include("resources/views/partials/footer.php"); ?>