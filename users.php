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
    <?php 
if(isset($_POST['u_user'])){
    $user_id=$_POST['user_id'];
    $u_name=$_POST['u_name'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $error=array();
    $select=mysqli_query($conn,"SELECT * from users where u_name='$u_name' and u_name!='".$_SESSION['u_name']."'");
    if(mysqli_num_rows($select)==1){
        array_push($error,"Username already existed");
        
    }

    if(!preg_match('/^[a-zA-Z ]*$/',$u_name)){
        array_push($error,"only letters required in names");
    }
    if((strlen($new_password)<8) or (strlen($old_password)<8) ){
        array_push($error,"Password must have 8 charactes atleast");
    }
    $pass_check=mysqli_num_rows(mysqli_query($conn,"SELECT * from users where user_id='$user_id' and u_password='$old_password'"));
    if($pass_check==0){
        array_push($error,"Incorrect Old password");
    }

    if(count($error)==0){
        $_SESSION['u_name']=$u_name;
        $insert=mysqli_query($conn,"UPDATE `users` SET `u_name` = '$u_name', `u_password` = '$new_password' WHERE `users`.`user_id` = '$user_id';");
        header('location:users.php');
    }
if(count($error)!=0){
    foreach($error as $item){
        ?>
        <p class='bg-danger result color-w'><?php echo $item ?></p>
        <?php 
    }

}
}





?>

<table class='table'>
<!-- f_id	f_name	l_name	age	sex	telephone	 -->
<!-- m_id	purpose	location	 -->
	<tr class='hd-tr'>
          <th>Username</th>
          <th>Change Accoutn Info</th>
    </tr>
    <?php
    $result=mysqli_query($conn,"SELECT * from users where u_name='".$_SESSION['u_name']."'");
    while($row=mysqli_fetch_array($result)){
        ?>
        <tr>
       
        <td><?php echo $row['u_name'] ?></td>
        <td><a href="update.php?user_id=<?php echo $row['user_id']?>" class='color-g'>Update</a></td>
        </tr>
        <?php 
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