<?php
  include  'config.php';
 $id=$_GET['id']; 
 $q="DELETE FROM `bookmark` WHERE id=$id"; 
 mysqli_query($conn,$q);
 header('location:bookmark.php');
?>