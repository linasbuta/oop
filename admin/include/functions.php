<?php 
 function redirect($location){
    header("Location: {$location}");
    exit();
 }

//  function classAutoLoader($class){
//      $class =strtolower($class);
//      $the_path = "include/{$class}.php";
//      if(is_file($the_path) && !class_exists($class)){
//          include($the_path);
//      }else{
//          die("This file name {$class}.php not found");
//      }
//  }
// spl_autoload_register('classAutoLoader');


?>