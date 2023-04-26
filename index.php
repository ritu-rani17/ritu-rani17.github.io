<?php error_reporting(0);?>
<?php include 'db.php';
$nameerr='';
$err='';
?>


<?php

if(isset($_GET['search']))
{
  $name =$_GET['name'];
  
  if($name == "")
  {
   $nameerr= "Please fill the field";

      
  }
  
 else{
$sql = "SELECT  course.course_name,university.university_name FROM university INNER JOIN 
course ON university.course_id = course.id || course.uni_id = university.id
 
 where course.course_name LIKE '%$name%' || university.university_name LIKE '%$name%'";
$result = mysqli_query($conn, $sql);

 
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo '<table border= "1">
  <tr>
  <th>Course Name</th>
  <th>University Name</th>
  </tr>';
  while($row = mysqli_fetch_assoc($result)) {
   // print_r($row); exit();
   echo '
   <tr>
    <td>'. "<b>Course Name:</b> " . $row['course_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;".'</td>
    <td>'. "<b>University Name:</b> " . $row['university_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;".'</td>
   </tr>';

}
echo '
</table>';
}
else{
  $err= "No data found";
}
}
}


?>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<title>search operation</title>
<body >
<form method="Get">
<div class="box">
<input type="text" name="name" >
<input type="submit" name= "search" value= Search >
<span id="err"><?php echo $nameerr ;?></span>
<span id="err"><?php echo $err ;?></span>
</div>
</form>

</body>

</html>
