<?php 
class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_field = array('photo_id','photo_title','photo_description', 'filename','type','size');
    protected static $where_id = 'photo_id';
    public $photo_id;
    public $photo_title;
    public $photo_description;
    public $filename;
    public $type;
    public $size;
    
   

    public $tmp_path;
    public $custom_errors = array();
    public $upload_derectory = "images";
    public $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => " Bigger then the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceed the MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partilly uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temprary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => " A PHP extension stopped the file upload"
  
    );
    
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->$custom_errors[] = "There was no file upoaded here";
            return false;
        }elseif($file['error'] !=0){
            $this->custom_errors[] = $this->upload_errors[$file['error']];
            return false;
        }else{

        

        
        $this->filename = basename($file['name']);
        $this->tmp_path = $file['tmp_name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        }
    }


    public function picture_path(){
        return $this->upload_derectory.LB.$this->filename;


    }
    public function save_photo(){

        if($this->photo_id){
            $this->photo_update();
        }else{
            if(!empty($this->custom_errors)){
                return false;
            }

            if(empty($this->filename || empty($this->tmp_path))){
                $this->custom_errors[] = "the file was not avaible";
                return false;
            }

            $target_path = SITE_ROOT .LB. 'admin'.LB. $this->upload_derectory .LB. $this->filename;

            if(file_exists($target_path)){
                $this->custom_errors[] = "the file {$this->filename} already exists";
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

    }

    public function delete_photo(){
        global $databese;

    $sql = "DELETE FROM ". static::$db_table ." WHERE ".static::$where_id." = ".$databese->escape_string($this->photo_id) ." ";

    $delete = $databese->query($sql);

      if($delete){
      
        $target_path = SITE_ROOT.LB.'admin'.LB.$this->picture_path();

       return unlink($target_path)? true : false;

      }else{
       
        return false;
      }
    }

}


?>