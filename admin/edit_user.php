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
                redirect("users.php");
            }else{

        
                $user = Users::find_id($_GET['id']);
                
                if(isset($_POST['update'])) {

                    if($user){
                        $user->username =
                        $_POST['username'];
                        
                        $user->first_name = $_POST['first_name'];

                        
                        $user->last_name = $_POST['last_name'];

                            $user->update();
                        
                            redirect("edit_user.php?id={$user->users_id}");
                        
                        


                        
                    


                    }
                    
                } 
            }
                    ?>

        
                

            <div class="admin-c2 ">
                content <h1>Photos_edit </h1>
                <div class="row">
                
            <div class="col-edit-8 p-4">

            <div>
                <img class="img-fluid" src="<?php echo $user->image_placeholder(); ?>" alt="">
            </div>
                <form action="" method="post" class="user_edit_form" enctype="multi/form-data">
            
                
        

                <input type="text" name="username" id="username" value="<?php  echo $user->username ; ?>">
                <label for="username" >Username</label>

                <input type="text" name="first_name" id="first_name" value="<?php  echo $user->first_name ; ?>">
                <label for="first_name" >first_name</label>

                <input type="text" name="last_name" id="last_name" value="<?php  echo $user->last_name ; ?>">
                <label for="last_name" >last_name</label>

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
