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

    public function execute($query, $params = []){
        try{
          $statement = $this->connection->prepare($query);
          $statement->execute($params);
          return $statement;
        }catch(PDOException $e){
          die('ERROR: '.$e->getMessage());
        }
      }

    public function insert($values){
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $this->execute($query, array_values($values));
    }

    public function select($where = null, $order = null, $fields = "*"){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.'';

        return $this->execute($query);
    }
}

abstract class Product{
    public $SKU;
    public $Name;
    public $Price;
    public $productType;
    public $productAttribute;

    // public function __construct($SKU = null, $Name = null, $Price = null, $productType = null, $productAttribute = null){
    //   $this->SKU = $SKU;
    //   $this->Name = $Name;
    //   $this->Price = $Price;
    //   $this->productType = $productType;
    //   $this->productAttribute = $productAttribute;
    // }

    public function create(){
        $db = new Database("products");
        $db->insert([
            "SKU" => $this->SKU,
            "Name" => $this->Name,
            "Price" => $this->Price,
            "productType" => $this->productType,
            "productAttribute" => $this->productAttribute
        ]);

        return true;
    }

    abstract public static function getProducts($where = null, $order = null);
    abstract public static function getProduct($SKU);
    abstract public function attributeString() : string;
}

class DVD extends Product{
    public static function getProducts($where = "productType = 'DVD'", $order = "SKU"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function attributeString() : string {
        return "Size: $this->productAttribute MB";
    }
}

class Book extends Product{
    public static function getProducts($where = "productType = 'Book'", $order = "SKU"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function attributeString() : string {
        return "Weight: $this->productAttribute KG";
    }
}

class Furniture extends Product{
    public static function getProducts($where = "productType = 'Furniture'", $order = "SKU"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function attributeString() : string {
        return "Dimension: $this->productAttribute";
    }
}
?>