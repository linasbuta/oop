<?php 
require_once("new_config.php");
class Database {

    public  $connection_mysqli;

    public function __construct(){
        $this->open_db_conection();
    }

    public function open_db_conection(){
        $this->connection_mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if($this->connection_mysqli->connect_errno) {
           die (" neveikia");
        }
    }

    public function query($sql){
       $result = $this->connection_mysqli->query($sql);
    
    
    return $result;
}

    public function confirm_query($result){
        if(!$result){
            die("query neveikia");
        }
    }

    public function escape_string($string){
     return   $this->connection_mysqli->real_escape_string($string);
    }
    public function fetch_assoc($result) {
       return $result->fetch_assoc();
    }

    public function insert_id(){
       return $this->connection_mysqli->insert_id;
    }

   
}
$databese = new Database();

?>