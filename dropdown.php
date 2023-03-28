<!DOCTYPE html>
<html>
<head>
	<title>Dropdown in bs</title>
	  <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2\bootstrap-5.0.2\dist\css\bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-5.0.2\bootstrap-5.0.2\dist\js\bootstrap.bundle.js"></script>
  <script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>
  <script type="text/javascript">
    $(document).ready(function(){
      // alert('hellow');
 
    })
  </script>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" >
    Dropdown button
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="dropdown?id=1" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown link
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
<?php
$conn=mysqli_connect('localhost','root','','handout_access');
$result=mysqli_query($conn,"SELECT * from student");

while($row=mysqli_fetch_array($result)){
  ?>
  <tr>
    <td><?php echo $row['fname'] ?></td>
      <td><?php echo $row['lname'] ?></td>
        <td><?php echo $row['email'] ?></td>
  </tr>
  <?php
} ;
?>

</body>
</html>