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
                content 

        
                
        <div class="table-margin">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Photo</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Last N</th>
                        <th>First N</th>
                    </tr>

                </thead>
                <tbody>
                <?php 
                $showUser = Users::finfAll();

                foreach($showUser as $user):

                ?>
                <tr>
                    <td>
                        <img class="img-fluid" src="<?php   echo $user->image_placeholder();?>">
                        <div class="users_links">

                            <a href="delete_user.php?id=<?php  echo $user->users_id; ?>">Delete</a>

                            <a href="edit_user.php?id=<?php  echo $user->users_id; ?>">Edit</a>
                            <a href="">View</a>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $user->users_id;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $user->username;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $user->first_name;
                            ?>
                    </td>
                    <td>
                        <?php
                            echo $user->last_name;
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