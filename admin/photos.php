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
        <div class="admin-c2">
            content <h1>Photos </h1>

            
        <div class="table-margin">
            <table class="table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>File Name</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Comments</th>
                    </tr>

                </thead>
                <tbody>
                <?php 
                $showPhoto = Photo::finfAll();

                foreach($showPhoto as $photo):

                ?>
                <tr>
                    <td>
                        <img class="img-fluid" src="<?php   echo $photo->picture_path();?>">
                        <div class="pictures_links">

                            <a href="delete_photo.php?id=<?php  echo $photo->photo_id; ?>">Delete</a>

                            <a href="edit_photo.php?id=<?php  echo $photo->photo_id; ?>">Edit</a>
                            <a href="../photo.php?id=<?php echo $photo->photo_id; ?>">View</a>
                            <?php 
                            
                            ?>
                            <a href="photo_comment.php?id=<?php echo $photo->photo_id; ?>">Comments</a>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $photo->photo_id;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $photo->filename;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $photo->photo_title;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $photo->size;
                            ?>
                    </td>

                    <td>
                <?php   $comments = Comments::find_the_comments($photo->photo_id); 
                echo count($comments);
                ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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


        
            
        <script src="custom.js"></script>
    </body>
    </html>
