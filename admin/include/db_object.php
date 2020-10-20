<?php 
class Db_object{



  public static function finfAll(){

      
      $All = static::findThisQuery("SELECT * FROM ". static::$db_table ." ");
      return $All;
      
  }
  public static function find_id($id){

     
    global $databese;
      $set_result = static::findThisQuery("SELECT * FROM " .static::$db_table. " WHERE ".static::$where_id ." = ".$databese->escape_string($id)." LIMIT 1 ");

      if(!empty($set_result)){
          
        $first_item =   array_shift($set_result);
        return $first_item;
      }else{
          return false;
      }
    
  
      
  }
    //==========================================
  public static function findThisQuery($sql){
    global $databese;
      $result_set = $databese->query($sql);
      $the_object_array = array();
        while($row = $databese->fetch_assoc($result_set)){
            $the_object_array[] = static::instations($row);         
        }
        
        return $the_object_array;
  }
    //========================================

    public static function instations($row){

        $calling_class =get_called_class();
        $the_users = new $calling_class;
            

      
        foreach($row as $the_attribute => $value){
            if($the_users->has_theattribute($the_attribute)){
                $the_users->$the_attribute = $value;
            }
        }
        return $the_users;
        
    }

    private function has_theattribute($the_attribute){
        $object_propertis = get_object_vars($this);
      return  array_key_exists($the_attribute, $object_propertis);
        
    }


//==================================================
//============================================
  public function save(){
    if(isset($this->users_id)){
    return $this->update();

    }else{
      return $this->create();
    }

  }

    public function create(){
    $properties = $this->clean_properties();


      global $databese;
      $sql = "INSERT INTO ". static::$db_table ."  (". 
      implode(",",array_keys($properties)).") ";

      $sql .= " VALUES('"
      .implode("','", array_values($properties))
      ."')";



    if( $databese->query($sql))
    {
      $this->users_id = $databese->insert_id();
      echo $this->users_id;

      echo "sukure";
      return true;
    }else{
      echo "nesukere";
      return false;
    }

    }

public function create_comments(){
  $properties = $this->clean_properties();


    global $databese;
    $sql = "INSERT INTO ". static::$db_table ."  (". 
    implode(",",array_keys($properties)).") ";

    $sql .= " VALUES('"
    .implode("','", array_values($properties))
    ."')";



  if( $databese->query($sql))
  {
    

   
    return true;
  }else{
   
    return false;
  }

  }
/**   ======================================= */
  public function update(){
    global $databese;
    $properties = $this->clean_properties();
    $properties_pairs = array();

    foreach($properties as $key=> $value){

      $properties_pairs [] ="{$key}='{$value}'";
      
    }

    $sql = "UPDATE ". static::$db_table ." SET ";
    $sql .= implode(",", $properties_pairs);
    $sql .= " WHERE ".static::$where_id." = '{$this->users_id}'";

    $kveriukas = $databese->query($sql);

    if($databese->connection_mysqli->affected_rows == 1){
      return true;
    }else{
      return false;
    }

  }

  public function delete(){
    global $databese;

    $sql = "DELETE FROM ". static::$db_table ." WHERE users_id = ".$databese->escape_string($this->users_id) ." ";

    $delete = $databese->query($sql);

      if($delete){
       
        return true;

      }else{
       
        return false;
      }


  }
  public function delete_comment(){
    global $databese;

    $sql = "DELETE FROM ". static::$db_table ." WHERE comments_id = ".$databese->escape_string($this->comments_id) ." ";

    $delete = $databese->query($sql);

      if($delete){
        
        return true;

      }else{
       
        return false;
      }


  }
  protected function clean_properties(){
    global $databese;
    $clean_properties = array();

      foreach($this->properties() as $key=>$value){

        $clean_properties[$key] = $databese->escape_string($value);

      }
    return $clean_properties;


  }
  public function properties(){
   
    $properties = array();

      foreach(static::$db_table_field  as $db_field){

        if(property_exists($this, $db_field))
        $properties[$db_field] =$this->$db_field;

      }
    return $properties;
  }

  /**   ======================================= */
  public function photo_update(){
    global $databese;
    $properties = $this->clean_properties();
    $properties_pairs = array();

    foreach($properties as $key=> $value){

      $properties_pairs [] ="{$key}='{$value}'";
      
    }

    $sql = "UPDATE ". static::$db_table ." SET ";
    $sql .= implode(",", $properties_pairs);
    $sql .= " WHERE photo_id = '{$this->photo_id}'";

    $kveriukas = $databese->query($sql);
    
    if($databese->connection_mysqli->affected_rows == 1
    ){
     
      return true;
    }else{
     
      return false;
    }

  }

  public static function count_all(){
    global $databese;
    $sql = "SELECT COUNT(*) FROM ". static::$db_table. "";
    $result_set =  $databese->query($sql);
    $row = mysqli_fetch_array($result_set);

    return array_shift($row);
  }


}


?>