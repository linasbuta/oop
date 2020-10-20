<?php 
 require_once("admin/include/init.php");


    if(empty($_GET['id'])){
        redirect("index.php");
    }
    $photo = Photo::find_id($_GET['id']);
    $photo->photo_id;
 
if(isset($_POST['submit'])){
   
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);
   
  
    $new_comment = Comments::creaty_comment($photo->photo_id, $author, $body);
   
    if($new_comment && $new_comment->create_comments()){

        
      
     redirect("photo.php?id={$photo->photo_id}");
        
    }else{
        $message = "There was some problems saving";
    }
    

   
    }else{
        $author = "";
        $body = "";
    }

$comments =Comments::find_the_comments($photo->photo_id);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Blog Post - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/blog-post.css" rel="stylesheet">

       

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Start Bootstrap</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

               
                <div class="col-lg-12">
                  
                    <!-- Title -->
                    <h1><?php echo  $photo->photo_title;?></h1>

                
                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                    <hr>

                    <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path();?>" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">
                        <?php echo $photo->photo_description?>
                    </p>
                
                
                    <hr>

                   
                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form role="form" method="post">

                        <div class="form-group">
                        <label for="author">Author</label>
                            <input type="text" id="author" name="author" class="form-control">
                            </div>

                            <div class="form-group">
                                <textarea name="body" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->

                <?php  foreach($comments as $comment): 
                    ?>

                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment->author?>
                                
                            </h4>
                        <?php echo $comment->body?>
                        </div>
                    </div>
                <?php endforeach; ?>
            

                </div>

            
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
