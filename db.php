<!-- <?php
	// $db = new Mysqli;
    // $db->connect('localhost', 'root', '', 'product_list');
?> -->

<!-- <?php
	// $db = new Mysqli;
    // $db->connect('sql302.epizy.com', 'epiz_31256053', '7dD59QGe4nloyJ', 'epiz_31256053_product_list');
?> -->

<?php
class Database{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DBNAME = "product_list";

    private $table;
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->createConnection();
    }

    private function createConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("ERROR: ".$e->getMessage());
        }
    }
}

abstract class Product{
    public $SKU;
    public $Name;
    public $Price;
    public $productType;
    public $productAttribute;

    public function __construct($SKU, $Name, $Price, $productType, $productAttribute){
      $this->SKU = $SKU;
      $this->Name = $Name;
      $this->Price = $Price;
      $this->productType = $productType;
      $this->productAttribute = $productAttribute;
    }

    public function create(){
        ;
    }

    abstract public function attributeString() : string;
}

class DVD extends Product{
    public function attributeString() : string {
        return "Size: $this->productAttribute MB";
    }
}

class Book extends Product{
    public function attributeString() : string {
        return "Weight: $this->productAttribute KG";
    }
}

class Furniture extends Product{
    public function attributeString() : string {
        return "Dimension: $this->productAttribute";
    }
}
?>