<?php
require_once("../../vendor/autoload.php");

use App\models\Book;
use App\models\DVD;
use App\models\Furniture;

print_r($_POST);
try {
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
        }
    }
} catch (\Throwable $t) {
    echo "caught!\n";

    echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
}

// header('location: index');
?>