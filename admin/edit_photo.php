<?php 
    include("admin_header.php");

?>
 <?php
   if(!$session->is_signed_in()){
        redirect('login.php');
 
    }

?>
     
    
    <nav>
    
        <div class="logo"><h4>Admin</h4></div>
        
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="logout.php">Log Out</a></li>
           

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <section class="admin-side-nav d-flex">
        <div class="admin-c">
            <ul class="nav-side">

                <li><a href="users.php">Users</a></li>
                <li><a href="comments.php">Comments</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="photos.php">Photos</a></li>
                
            
            

            </ul>
            </div>
            <?php 
            if(empty($_GET['id'])){
                redirect("photos.php");
            }else{

        
                $photo = Photo::find_id($_GET['id']);
                
                if(isset($_POST['update'])) {

                    if($photo){
                        $photo->photo_title =
                        $_POST['title'];
                        
                        $photo->photo_description = $_POST['description'];


                        $photo->save_photo();
                    


                    }
                    
                } 
            }
                    ?>

        
                

            <div class="admin-c2 ">
                content <h1>Photos_edit </h1>
                <div class="row">
                
            <div class="col-edit-8">
                <form action="" method="post">
            
                
            <div>
            <a href="#"><img src="<?php echo $photo->picture_path();?>" class="img-fluid"></a>
            </div>
                <input type="text" name="title" id="title" value="<?php  echo $photo->photo_title ; ?>">
                <label for="title" >Title</label>

            <textarea name="description" id="description" cols="30" rows="10">
            <?php  echo $photo->photo_description ; ?>
            </textarea >
                <label for="description">Description</label>
                </div>
                <div class="col-edit-4">
                    <p>data</p>
                    <p>save</p>
                    <input type="submit" name="update" value="update">

                </div>
                </form>
                </div>
        
            
            </div>
    </section>



    <script src="../../jquery.js"></script>


            <script type="text/javascript">
                $(document).ready(function(){
                    $('.burger').click(function(){
                        $('.nav-links').toggleClass('rodo');
                    });
                });
            </script>


        
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> 

        <script src="admin_assets/js/custom.js"></script>
    </body>
    </html>
