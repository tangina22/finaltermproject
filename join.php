<?php
session_start();
$aid=$_SESSION['id'];
$id=$_GET['id'];
include  'config.php';
   $c_name="";
   $c_teacher="";
   $c_contact="";
   $c_desc="";

   $sql = "SELECT * FROM `product` WHERE `id`='$id'";   
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
		       $c_name=$row["course_name"];
           $c_teacher=$row["course_teacher"];
           $c_contact=$row["contact_info"];
           $c_desc=$row["sortdes"];          
        }

}
   
 if(isset($_POST['btn1'])){

	 $q="INSERT INTO `stu_courses` (`id`, `course_name`, `course_teacher`, `teacher_mail`, `stu_id`, `course_desc`) VALUES (NULL, '$c_name', '$c_teacher', '$c_contact', '$aid', '$c_desc');";
	 $query=mysqli_query($conn,$q);
	header('location:yourcourse.php');
 }
?>
<!DOCTYPE html>
<html>
<body>
<h2>Join A course</h2>
<table>
<form method="post" action="" enctype="multipart/form-data">

   <tr>
       <td> Course name: </td>
   </tr>
   <tr>
       <td><input type="text" name="name" value="<?php echo $c_name;  ?>" disabled></td>
   </tr>
   <tr>
       <td> Course teacher: </td>
   </tr>
   <tr>
       <td><input type="text" name="price" value="<?php echo $c_teacher;  ?>" disabled></td>
   </tr>

    <tr><td>teacher contact</td></tr>
	<tr>
        <td><input type="text" name="price" value="<?php echo $c_contact;  ?>" disabled></td>
   </tr>
    <tr>
	    <td>Course description</td></tr>
		<tr>
       <td><textarea name="longdes" rows="5" cols="40" value="" disabled><?php echo $c_desc;  ?></textarea></td>
   </tr>
    
   <tr><td></td></tr>
   <tr>
       <td> <input type="submit" name="btn1" value="Join course" ></td>
   </tr>
</form> 
</table>

</body>
</html>