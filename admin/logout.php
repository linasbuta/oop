<?php
include("include/init.php");
?>
<?php 
 $session ->logout();
 redirect('login.php');
?>
