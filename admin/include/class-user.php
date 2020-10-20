<?php
class Users  extends Db_object{


    protected static $db_table = "users";
    protected static $db_table_field = array('username','passwords', 'first_name','last_name','user_image');
    protected static $where_id = 'users_id';
    public $users_id;
    public $username;
    public $passwords;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder ="http://placehold.it/400x400&text=image";
   

    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->$custom_errors[] = "There was no file upoaded here";
            return false;
        }elseif($file['error'] !=0){
            $this->custom_errors[] = $this->upload_errors[$file['error']];
            return false;
        }else{

        

        
        $this->user_image = basename($file['name']);
        $this->tmp_path = $file['tmp_name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        }
    }


    public function picture_path(){
        return $this->upload_derectory.LB.$this->user_image;


    }
    public function save_photo_user(){

       
            if(!empty($this->custom_errors)){
                return false;
            }

            if(empty($this->user_image || empty($this->tmp_path))){
                $this->custom_errors[] = "the file was not avaible";
                return false;
            }

            $target_path = SITE_ROOT .LB. 'admin'.LB. $this->upload_directory .LB. $this->user_image;

            if(file_exists($target_path)){
                $this->custom_errors[] = "the file {$this->user_image} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){
                if( $this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->custom_errors[] = "THe file directory does not have permision";
                return false;
            }


           
        

    }





    public function image_placeholder(){
       if(empty($this->user_image)){
           return $this->image_placeholder;
       }else{
           return $this->upload_directory.LB.$this->user_image;
       }
    }

   

    public static function verify_user($username, $password){
      global $databese;
      $username = $databese->escape_string($username);
      $password = $databese->escape_string($password);

    $sql = "SELECT * FROM " .self::$db_table. " WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= " AND passwords = '{$password}'";
    $sql .= " LIMIT 1";

    $set_result = self::findThisQuery($sql);

    if(!empty($set_result)){
        // array_shift pasalina pirma elementa is array ir grazina ji
     $first_item =   array_shift($set_result);
     return $first_item;
    }else{
        return false;
    }
 


    }

    
    

    

}
