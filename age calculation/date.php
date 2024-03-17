
<?php
include_once 'index.php';
?>
<!DOCTYPE html>
<form action="date.php" method="POST">
<html>
  <head>
    <title>Information retrival</title>
  </head>
  <body><table>
    <h1>Enter Details:</h1>
    <h2>Employee code<input type="text"   value="" placeholder ="Enter your code"name="code"/></h2>
    <h2>Employee Name<input type="text" value="" placeholder ="Enter your name" name="name"/></h2>
    <h2>joining date<input type="date"  name="joiningdate"/></h2>
    

    <h2>dateofbirth date<input type="date"   name="dateofbirthdate"/></h2>
<input type="submit"   name="submit"/></table></body>

</form>
<?php


$currentdate= date("Y-m-d",strtotime(date("Y/m/d") ));
  $date1= new DateTime("$currentdate");
if(isset($_POST['submit'])){
  $code=$_POST['code'];
  $name=$_POST['name'];
  $datejoin=$_POST['joiningdate'];
 
  
  //$datejoin = date("Y-m-d", strtotime($newdatejoin)); 
      $newdobdate=$_POST['dateofbirthdate'];
 
  
  echo"ppp";
  $insert=mysqli_query($con,"INSERT INTO `information`.`employee`
  (`employee code`,
  `employee name`,
  `date of joining`,
  `date of birth`)
  VALUES
  ('$code','$name','$datejoin','$newdobdate');
  
  ");
 
 //if($yes)echo"Added Successfully------".$name;
 //else echo mysqli_error($yes);
//else
//cho"notadded";

  ?>
  <table border="1">
<tr>

<td> <h3>Employee name</h3></td>
<td> <h3>Employee code</h3></td>

<td><h3>date of joining</h3></td>
<td><h3>date of birth</h3></td>
<td><h3>current date</h3></td>

<td><h3>age </h3></td>
<td><h3> months</h3></td>
<td><h3> days</h3></td></tr>

  <?php
  
   $show=mysqli_query($con,"SELECT `employee`.`employee code`,
   `employee`.`employee name`,
   `employee`.`date of joining`,
   `employee`.`date of birth`
 FROM `information`.`employee`;
 ");
 
  $rows=mysqli_num_rows($show);
  if($rows > 0){
  while($rows=mysqli_fetch_assoc($show))
  {
  //echo '<table border="1">';
  
  echo "<tr><td>".$rows['employee code']."</td>";
  echo "<td>".$rows['employee name']."</td>";
  echo "<td>".$rows['date of joining']."</td>";
  echo "<td>".$rows['date of birth']."</td>";
  echo "<td>".$currentdate."</td>";
  $dobdate = date("Y-m-d", strtotime($rows['date of birth'])); 
  
  $date2 = new DateTime("$dobdate");
  echo "<td>".$date1->diff($date2)->format("%y")."</td>";
  echo "<td>".$date1->diff($date2)->format("%m")."</td>";
  echo "<td>".$date1->diff($date2)->format("%d")."</td></tr>";
  
  
}}?>
</table></body>
<?php


  
} else
echo"Enter submit";
?>
</tr>