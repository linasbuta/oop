<?php include("includes/header.php"); ?>
<?php 
    $page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
    $item_per_page = 4;
    $items_total_count = Photo::count_all();

    $paginate = new Paginate($page, $item_per_page, $items_total_count);

    $sql = "SELECT * FROM photos LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
    $photos = Photo::findThisQuery($sql);


?>

        <div class="row">

           
            <div class="col-md-12 ">
            <div class="thumbnail row">
         <?php 
            foreach($photos as $photo):         
         ?>
        
               <div class="col-xs-6 col-md-3">
                <a class="thumbnail" href="photo.php?id=<?php echo $photo->photo_id?>">
                    
                    <img class=" picture_home_page img-responsive" src="admin/<?php echo $photo->picture_path();?>" alt="">
                </a>
               </div> 
               
       
         <?php 
         endforeach;
         ?>
           </div>

           <div class="row">
            <ul class="pager">

            <?php 
            if($paginate->page_total() > 1){
                if($paginate->has_next()){
                    echo "<li class=\"next\">
                    <a href=\"index.php?page={$paginate->next()}\">Next  </a>
                </li>";
                }
            }
            
          for($i=1; $i <= $paginate->page_total(); $i++){
            if($i == $paginate->current_page){
                
                echo "<li>$i</li> ";
            }else{
               
                echo "<li class=\"active\"><a href=\"index.php?page={$i}\">$i</a></li> ";
            }

          }
           
          
            if($paginate->page_total() > 1){
                if($paginate->has_prevoius()){
                    echo "<li class=\"previous\">
                    <a href=\"index.php?page={$paginate->previous()}\">Previous  </a>
                </li>";
                }
            }
            
            ?>
                    
                   
            </ul>
           
           </div>
        

            </div>


        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
