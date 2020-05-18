<?php
session_start();

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
  header("location: index.php");
  exit;
}

$id=$_SESSION['id'];
?>
<html>
<head>
  <title>display</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <style>
    #maincontainer{
	margin-left:100px;
	margin-top:50px;
}
#image{
	 float: left;
}
#information{
	 float: right;
}
#mySidenav a {
    position: absolute;
    left: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#about {
    top: 80px;
    background-color: #4CAF50;
}

#blog {
    top: 160px;
    background-color: #2196F3;
}

#projects {
    top: 240px;
    background-color: #f44336;
}

#contact {
    top: 320px;
    background-color: #555
}
  </style>
</head>

<body>
  
  <div id="mySidenav" class="sidenav">
  <a href="userprofile.php" id="about">Profile</a>
  <a href="yourcourse.php" id="blog">Your Courses</a>
  <a href="display.php" id="projects">Courses</a>
  <a href="logout.php" id="contact">Logout</a>
</div>
  
 <div id="maincontainer">
  <center><h2>All courses</h2></center>
<div class="container">
<div class="col-lg-12">
<table class="table table-striped table-hover table-bordered">
  <tr class="bg-dark text-white">
  <th> Course Name</th>
  <th> Course State</th>
  <th> Course Teacher</th>
  <th> Teacher Email</th>
  <th> Join</th>
  </tr>
  <?php
  include  'config.php';

	 $q="select * from product";
	 //echo $q;
	 $query=mysqli_query($conn,$q);	  
	 while($res=mysqli_fetch_array($query)){
		 
	 
?>

  <tr class="text-center">
      <td><?php echo $res['course_name']; ?></td>
	  <td><?php echo $res['validity']; ?></td>
	  <td><?php echo $res['course_teacher']; ?></td>
    <td><?php echo $res['contact_info']; ?></td>
	  <td><button class="btn-primary btn"><a href="
	  join.php?id=<?php echo $res['id'];?>" class="
	  text-white">Join</a></button></td>
  </tr>
	 <?php } ?>
</table>
</div>

</div>
</div>
</body>
</html>