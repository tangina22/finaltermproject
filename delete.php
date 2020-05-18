<?php
  include  'config.php';
 $id=$_GET['id']; 
 $q="DELETE FROM `stu_courses` WHERE id=$id"; 
 mysqli_query($conn,$q);
 header('location:yourcourse.php');
?>