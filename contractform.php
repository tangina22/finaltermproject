
<?php
include  'config.php';
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  
  else if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
  else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } 
    
  else if (empty($_POST["website"])) {
    $websiteErr = "website is required";
  } 

  else if (empty($_POST["comment"])) {
    $comment = "";
  } 
    
  else if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  }
  else{
    $gender = test_input($_POST["gender"]);
    $comment = test_input($_POST["comment"]);
    $website = test_input($_POST["website"]);
    $email = test_input($_POST["email"]);
    $name = test_input($_POST["name"]);
    $q="INSERT INTO `contacts` (`id`, `name`, `email`, `website`, `comment`) VALUES (NULL, 'sohel', 'sohel@gmail.com', 'dfdfdf', 'dfdfdffdf')";
    $query=mysqli_query($conn,$q);
    echo "sucess";
  
  } 
    
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
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
</style>
</head>
<body>
  <div class="navbar">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <!--<button class="dropbtn">Services 
      <i class="fa fa-caret-down"></i>
    </button>-->
    <div class="dropdown-content">
      <a href="mobille.php">Mobile</a>
      <a href="tv.php">Tv</a>
      <a href="fridge.php">Fridge</a>
    </div>
  </div> 
  <a href="service-login.php">Login As student</a>
  <a href="blog.php">Blog</a>
  <a href="contractform.php">Contract with us and give review</a>
  
</div>

<br><br>
<h2>Contract With us</h2>
<br><br>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>
<br><br><br>

</html>