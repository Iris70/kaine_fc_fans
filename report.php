<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2\bootstrap-5.0.2\dist\css\bootstrap.css">
    <script src="bootstrap-5.0.2\bootstrap-5.0.2\dist\js\bootstrap.js"></script>
    <script src="jquery.min.js"></script>
   <link rel="stylesheet" href="mydesign.css">
</head>
<body>
   <div class='flex-box'>
<!-- start of left -->
<div  class="flex-box-item left">
<div class='visit'>
<h2 class='hd-visit'>Visit Also</h2>
<ul>
    <li><a href="http://www.fifa.com">Fifa</a></li>
    <li><a href="http://www.Minisante.com">Minisante</a></li>
    <li><a href="http://www.Ferwafa.com">Ferwafa</a></li>
</ul>
</div>
</div>
<!-- start middle  -->
<div  class="flex-box-item middle">

<h2 class='hd'>Kaine Fc</h2>

<div class="staff">

<div class='rows'>
    <span>Presindent: </span><span> Jeff MUHINYUZA</span>
</div>

<div class='rows'>
    <span>Manager: </span><span> Dreck GATO</span>
</div>

<div class='rows'>
    <span>Secretary: </span><span> Jeanne KAYITERA</span>
</div>

<div class='rows'>
    <span>Captain: </span><span> Rico Pie</span>
</div>

<div class='rows'>
    <span>Accountant: </span><span> Monday Chrito</span>
</div>

</div>

<div class="contents">
<form action="process_report.php" method="post">
<h1 class="hd-form">Weekly Report</h1>
    <div class='container p-2 bg-rep color-w'>
        <input type="week" name="week" id="" class='form-control w-50 d-inline'>
<button type="submit" name='report' class='bg-green color-w  btn'>Generate Report</button>
<!-- <button type="submit" name='report' class='bg-green color-w  btn'>Generate Report</button> -->
    </div>
</form>
<?php 
if(isset($_POST['report'])){
    ?>
    <table class='table'>
     <!-- p_id	m_id	f_id	user_id	date	 -->
	<tr class='hd-tr'>
          <th>Participation Id</th>
          <th>Meeting</th>
          <th>Fan</th>
          <th>user</th>
          <th>date</th>
          
    </tr>
    <?php 
    $week=$_POST['week'];

    $week_arr=explode('-W',$week);
   $year=$week_arr[0];
   $week_no=$week_arr[1];
  
   $result=mysqli_query($conn,"SELECT * from((participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id)  where week(participation.date)='$week_no' and year(participation.date)='$year'");
   while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
    <td><?php echo $row['p_id'] ?></td>
    <td><?php echo $row['purpose'] ?></td>
    <td><?php echo $row['f_name']."".$row['l_name'] ?></td>
    <td>
        <?php
         $user_id=$row['user_id'] ;
         $user_info=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id='$user_id'"));
         echo $user_info['u_name'];

        ?>
    </td>
    <td><?php echo $row['date'] ?></td>

    </tr>
    <?php 
}
}
?>
</table>






<!-- end of contents -->
</div>





<!-- last div middel -->
</div>
<!-- end of middle -->


<!-- start of right -->

<div class="flex-box-item right">
    <div class="announcements">
        <h2 class='hd-an'>announcements</h2>
<p>CLUB Party at muhazi beach on 26th December 2022.</p>
    </div>
    <div class="navs">
        <a href="fans.php" class="navs-item">Fans</a>
        <a href="meeting.php" class="navs-item">Meeting</a>
        <a href="paticipations.php" class="navs-item">Participation</a>
         <a href="users.php" class="navs-item">My Account</a>
    </div>
   
    <a href="logout.php?logout" class="logout">Logout</a>

</div>





   </div> 
</body>
</html>