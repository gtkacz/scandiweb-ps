<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/24/2022
 * Time: 7:25 PM
 */

namespace App\models;

use PDO;

class Furniture extends Product
{
    public static function getProducts($where = "productType = 'Furniture'", $order = "'SKU'")
    {
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU)
    {
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function remove()
    {
        return (new Database('products'))->delete("SKU = '{$this->SKU}'");
    }

    public function attributeString(): string
    {
        return "Dimension: $this->productAttribute";
    }
}