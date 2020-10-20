<?php
class Comments  extends Db_object{


    protected static $db_table = "comments";
    protected static $db_table_field = array('photo_id','author', 'body',);
    protected static $where_id = 'comments_id';
    public $comments_id;
    public $photo_id;
    public $author;
    public $body;
   

    public static function creaty_comment($photo_id, $author="", $body=""){

        if(!empty($photo_id) && !empty($author) && !empty($body)){
            $comment = new Comments();
            $comment->photo_id = (int)$photo_id;
            
            $comment->author   = $author;
            $comment->body     = $body;

            return $comment;
          
        }else{
            return false;
        }
    }
    

    public static function find_the_comments($photo_id){

        global $databese;
        $sql ="SELECT * FROM ".self::$db_table;
        $sql.= " WHERE photo_id = " .$databese->escape_string($photo_id)."" ;
        $sql.= " ORDER BY photo_id ASC ";

        return self::findThisQuery($sql);

    }

   


}
