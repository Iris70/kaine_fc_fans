<?php

include('connection.php');
session_start();
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
<h1 class="hd-form">Create Secretary</h1>
<?php 
if(isset($_POST['login'])){
    $u_name=$_POST['u_name'];
    $u_password1=$_POST['u_password1'];
    $u_password2=$_POST['u_password2'];
    $error=array();
    $select=mysqli_query($conn,"SELECT * from users where u_name='$u_name' ");
    if(mysqli_num_rows($select)==1){
        array_push($error,"Username already existed");
        
    }

    if(!preg_match('/^[a-zA-Z ]*$/',$u_name)){
        array_push($error,"only letters required in names");
    }
    if((strlen($u_password1)<8) or (strlen($u_password2)<8) ){
        array_push($error,"Password must have 8 charactes atleast");
    }
    if($u_password1!=$u_password2){
        array_push($error,"Passwords doesn't match");
    }
    if(count($error)==0){
        $insert=mysqli_query($conn,"INSERT into users values(null,'$u_name','$u_password1')");
    
        header('location:index.php');
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
  
    <form action="" method="post" class='w-50'>
        <div class='form-group'>
            <label for="" class='form-label'>Username</label>
            <input type="text" name="u_name" id="" class='form-control input'>
        </div>
        <div class='form-group'>
            <label for="" class='form-label'>Password</label>
            <input type="password" name="u_password1" id="" class='form-control input'>
        </div>
        <div class='form-group'>
            <label for="" class='form-label'>Confirm Password</label>
            <input type="password" name="u_password2" id="" class='form-control input'>
        </div>
        <button type="submit" name='login' class='bg-green w-25 color-w btn my-2'>Create</button>
        <span class='mx-2'>Are you A member <a href="index.php" class='color-g' style='text-decoration:underline'>Login</a></span>
    </form>

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