<?php
class Database{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DBNAME = "product_list";

    // const HOST = "sql205.iceiy.com";
    // const USER = "icei_31280718";
    // const PASSWORD = "IMVf6TvQhqHy";
    // const DBNAME = "icei_31280718_product_list";

    private $table;
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        if(!isset($this->connection)){
            $this->createConnection();
        }
    }

    private function createConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("ERROR: ".$e->getMessage());
        }
    }

    private function execute($query, $params = []){
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

    public function update($where, $values){
        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where){
        $query = "DELETE FROM {$this->table} WHERE {$where}";
        // $query = "DELETE FROM products WHERE '$where'";
    
        $this->execute($query);
    
        return true;
      }
}

abstract class Product{
    public $SKU;
    public $Name;
    public $Price;
    public $productType;
    public $productAttribute;

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

    public function edit($oldSKU){
        $db = new Database("products");
        $db->update('SKU = '.$oldSKU, [
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
    abstract public function createAttribute($data);
    abstract public function remove();
    abstract public function attributeString() : string;
}

class DVD extends Product{
    public static function getProducts($where = "productType = 'DVD'", $order = "'SKU'"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function createAttribute($data){
        $this->productAttribute = $data['size'];
    }
    
    public function remove(){
        return (new Database('products'))->delete("SKU = '{$this->SKU}'");
    }

    public function attributeString() : string {
        return "Size: $this->productAttribute MB";
    }
}

class Book extends Product{
    public static function getProducts($where = "productType = 'Book'", $order = "'SKU'"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function createAttribute($data){
        $this->productAttribute = $data['weight'];
    }

    public function remove(){
        return (new Database('products'))->delete("SKU = '{$this->SKU}'");
    }

    public function attributeString() : string {
        return "Weight: $this->productAttribute KG";
    }
}

class Furniture extends Product{
    public static function getProducts($where = "productType = 'Furniture'", $order = "'SKU'"){
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU){
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function createAttribute($data){
        $height = $data["height"];
        $width = $data["width"];
        $length = $data["length"];

        $this->productAttribute = "${height}x${width}x${length}";
    }

    public function remove(){
        return (new Database('products'))->delete("SKU = '{$this->SKU}'");
    }

    public function attributeString() : string {
        return "Dimension: $this->productAttribute";
    }
}
?>