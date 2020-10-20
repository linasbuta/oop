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
                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                <div>
                <?php echo "Yra perziuru prisijungusiu<h1>".$session->count. "</h1>";?>
                </div>
                <div>
                <h2>Kiek yra nuotrauku</h2>
                <?php echo Photo::count_all();?>
                </div>
                <div>
                <h2>Kiek yra useriu</h2>
                <?php echo Users::count_all();?>
                </div>
                <div>
                <h2>Kiek yra comentaru</h2>
                <?php echo Comments::count_all();?>
                </div>

            
        
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

          <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',  <?php echo $session->count; ?>],
          ['Photos', <?php echo Photo::count_all(); ?>],
          ['Users', <?php echo Users::count_all(); ?>],
        
         ['Comments', <?php echo Comments::count_all(); ?>]
        ]);

        var options = {
            pieSliceText: 'label',
          title: 'VPUC',
          backgroundColor:'transparent',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
        
    <script src="custom.js"></script>
</body>
</html>