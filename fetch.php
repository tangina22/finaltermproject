<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "finalwebproject");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM product  WHERE course_name LIKE '%".$search."%' OR course_teacher LIKE '%".$search."%' ";
}
else
{
 $query = "SELECT * FROM product where validity='accepted' ORDER BY id DESC";
}
$result = mysqli_query($connect, $query);
 if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               
			   echo "<div id='main'>";
                echo "<div id='sidebar'>";
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'"height="198" width="200"/>';
			    echo "</div>";
			
                    echo "<div id='page-wrap'>";
			 echo "<table border='1'>";
			 echo "<tr><th>Course Name:</th><td>" . $row["course_name"]."</td></tr>";
			 echo "<tr><th>Course Teache:</th><td>".$row["course_teacher"]."</td></tr>";
			 echo "<tr><th>Course Price:</th><td>".$row["course_price"]."</td></tr>";
			 echo "<tr><th>Teacher Email:</th><td>".$row["contact_info"]."</td></tr>";
		  echo "</table>";
		        	 echo "</div>";
			  echo "</br>";
			    echo "<div id='description-button'>";
			    echo "<a class='btn' href='show.php?id=".$row["id"]."'>View Full Description</a>";
			    echo "</div>";
			   echo "</br>";
              echo "</div>";
			   echo "</br>";
 echo $output;
 }}
else
{
 echo 'Data Not Found';
}

?>