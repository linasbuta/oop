

<?php 
include("admin_header.php");

?>
   <?php
   if(!$session->is_signed_in()){
 redirect('login.php');
}?> 

<?php 
    $message = "";
    if(isset($_POST['submit'])){
        $photo = new Photo();
        $photo->photo_title = $_POST['title'];
        $photo->set_file($_FILES['file_upload']);

        if($photo->save_photo()){
            $message = "Photo uploaded Succesfully";
        }else{
            $message = join("<br>", $photo->custom_errors);
        }
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
                content <h1>Photos upload</h1>
                <h2><?php echo $message;?></h2>
            
            
                <!--Form-->
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <?php 
                    
                ?>
                <input type="text" name="title"><br>

                <input type="file" name="file_upload"><br>
                <input type="submit" name="submit">
                </form>

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
