<?php 
    include("admin_header.php");

?>

<?php
   if(!$session->is_signed_in()){
        redirect('login.php');
    }?>

    <?php if(empty($_GET['id'])) {
        redirect('users.php');
    }
    $user = Users::find_id($_GET['id']);
    $user->delete();
    
    if($user){
    
        $user->delete();
        
        redirect('users.php');

    }else{
        redirect('users.php');
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
            <div class="admin-c2">
                content
                </div>
    </section>

    <script src="../jquery.js"></script>


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