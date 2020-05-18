<?php
//session_start();
 include  'config.php';
  $sid=$_GET['id'];
  $course_name=$price=$teacher_name=$description=$image=$adminid=$contact_info='';
  //echo $sid;
  $username=$address=$password=$phoneno=$email="";
    $sql = "SELECT  *  FROM product where id='$sid'";
	 //echo $sql;
         $result = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($result) > 0) {
		 while($row = mysqli_fetch_assoc($result)) {
			 $course_name=$row['course_name'];
			 $price=$row['course_price'];
			 $teacher_name=$row['course_teacher'];
			 $description=$row['description'];
             $image=$row['photo'];
             $adminid=$row['adminid'];
             $contact_info=$row['contact_info'];			 
		 }
		 }
     if(isset($_POST['bookmark'])){
       
       $q="INSERT INTO `bookmark` (`id`, `course_name`, `teacher_name`, `price`) VALUES (NULL, '$course_name', '$teacher_name', '$price');";
       // echo $q;
       $query=mysqli_query($conn,$q);
       
     }
		 
		 
          	 
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.btn{
	
	background-color: #4CAF50;
    border: none;
    color: white;
    padding: 14px 122px;
    text-decoration: none;
    margin: 16px 2px;
    cursor: pointer;
	
}
 #description-button{
	 
	 margin-left: 55px;
	 
 }
table {
    border-collapse: collapse;
    width:97%;
	margin:2px;
	margin-left:6px;
}

th, td {
    text-align: left;
    padding:15.5px;
	
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

#main { 
    width: 498px ;
	height:auto;
    margin: 0 auto;
	border-style:solid;
	border-color:green;
}
#sidebar    {
    width: 200px;
    height: auto;
	border-right-style:solid;
	border-bottom-style:solid;
	border-color:green;
    float: left;
	
	
}

#page-wrap  {
    width: 300px;
    height: 200px;
    margin-left: 200px;
	border-bottom-style:solid;
	border-color:green;
	
}
body {
    font-family: "Lato", sans-serif;
}
.h2collor{
 color: white;
 font-size: 16px;
 text-align: center;
}
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.search{
	
    position: absolute;
   margin-left:900px;
   margin-top:12px;
   padding-left:200px;
}
.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: absolute;
    z-index: 1;
    top: 20;
    left: 10;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 18px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px; margin-top:22px;}
    .sidenav a {font-size: 18px;}
}
.leftinfo{
	float:center;
	width:40%;
}
.rightinfo{
	float:right;
	margin-right:300px;
}
</style>
</head>
<body>
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="service-login.php">Login As Student</a>
  <div class="dropdown">
    <!--<button class="dropbtn">Services 
      <i class="fa fa-caret-down"></i>
    </button>-->
  </div> 
  <a href="blog.php">Blog</a>
  <a href="contractform.php">Contract with us</a>
  <a href="bookmark.php">Book Marks</a>
</div>

<center>
<div class="main">

 	   <div class="leftinfo">
      <br><br>
      <center><form method="POST">
      <input type="submit" name="bookmark" value="Add Bookmark">
    </form></center>
	   <h3>Course information</h3>
	   <div><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"height="198" width="200"/>';?></div>
     <table>
	   <tr><div><td><h4>Course name</h4></td><td><?php echo $course_name;?></td></div></tr>
	   <tr><div><td><h4>Course price</h4></td><td><?php echo $price." $";?></td></div></tr>
     <tr><div><td><h4>Course teacher</h4></td><td><?php echo $teacher_name." $";?></td></div></tr>
		 <tr><div><td><h4>Course Description</h4></td><td><?php echo $description;?></td></div></tr>
	   <tr><div><td><h4>Contact Informaion</h4></td><td><?php echo $contact_info;?></td></div></tr>

     </table>
     
	 </div>
	 <!--<div class="rightinfo">
	 <h3>Your information</h3>
	 <div><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($bimage).'"height="198" width="200"/>';?></div>
	  <?php  echo "<div class='username'><h3>Buyer username:</h3>".$username."</div><br>";?>
	  <?php	echo "<div class='address'><h3>Buyer address:</h3>".$address."</div><br>";?>
	  <?php echo "<div class='phoneno'><h3>Buyer phone No</h3>".$phoneno."</div><br>";
		echo "<div class='email'><h3>Buyer email</h3>".$email."</div><br>"; ?>
	 </div>-->
</div>
</center>
</body>
</html> 

