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
}
?>