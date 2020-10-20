<?php 
    include("admin_header.php");

?>
 <?php
   if(!$session->is_signed_in()){
        redirect('login.php');
 

    }?>  
        
    
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
            

        
                
        <div class="table-margin">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                        Delete
                        </th>
                        <th>Comment id</th>
                        <th>ID Photo</th>
                        
                        <th>Author</th>
                        <th>Body</th>
                    </tr>

                </thead>
                <tbody>
                <?php 

                if(empty($_GET['id'])){
                    redirect("photos.php");
                }
                $comments = Comments::find_the_comments($_GET['id']);

            


                foreach($comments as $comment):

                ?>
                <tr>
                    <td>
                        <img class="img-fluid" src="<?php    //$comment->image_placeholder();?>">
                        <div class="users_links">

                            <a href="delete_comment.php?id=<?php  echo $comment->comments_id; ?>">Delete</a>

                            
                        
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $comment->comments_id;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $comment->photo_id;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $comment->author;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $comment->body;
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