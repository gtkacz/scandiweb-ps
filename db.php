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
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $dbName = "product_list";

    public $db;

    public function __construct(){
        $this->dbConnection();
    }

    public function dbConnection(){
        $this->db = new Mysqli($this->host, $this->user, $this->password, $this->dbName);

        if(!$this->db){
            print($this->db->num_error);
            exit();
        }
    }

    public function save($table, $fields = ''){
        $insert = "INSERT INTO ".$table."(".implode(",", array_keys($fields)).") VALUES ('".implode("','", array_values($fields))."')";

        $answer = $this->db->query($insert);

        if($answer){
            return true;
        } else{
            return false;
        }
    }

    public function view($table){
        $select = "SELECT * FROM {$table} ORDER BY `SKU` ASC";
        $answer = $this->db->query($select);

        $list = array();

        while($data = $answer->fetch_array()){
            $list[] = $data;
        }
        return $list;
    }

    public function delete($table, $where){
        $condition = "";

        foreach($where as $key => $value){
            $condition .= $key. "= '".$value."' AND ";
        }

        $condition = substr($condition, 0, -5);
        $delete = "DELETE FROM {$table} WHERE {$condition}";

        $answer = $this->db->query($delete);

        if($answer){
            return true;
        } else{
            return false;
        }
    }
}

abstract class Product{
    private $SKU;
    private $Name;
    private $Price;
    private $productType;
    private $productAttribute;

    public function __construct($SKU, $Name, $Price, $productType, $productAttribute){
      $this->SKU = $SKU;
      $this->Name = $Name;
      $this->Price = $Price;
      $this->productType = $productType;
      $this->productAttribute = $productAttribute;
    }

    abstract public function intro() : string;
}

class Audi extends Product{
    public function intro() : string {
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Product{
    public function intro() : string {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class Citroen extends Product{
    public function intro() : string {
        return "French extravagance! I'm a $this->name!";
    }
}
?>