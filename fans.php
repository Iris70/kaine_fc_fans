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
   <link rel="stylesheet" href="fontawesome\font\css\all.min.css">
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
// update fans starts



if(isset($_POST['u_fans'])){
    // <!-- f_id	f_name	l_name	age	sex	telephone	 -->
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $f_id=$_POST['f_id'];
    $telephone=$_POST['telephone'];
    $error=array();
    //validation
    if(!preg_match('/^07/',$telephone)){
        array_push($error,"PHone number must start with 07");
    }
    if(!preg_match('/^[a-zA-Z ]*$/',$f_name)){
        array_push($error,"first name must have letters only");
    }
    if(!preg_match('/^[a-zA-Z ]*$/',$l_name)){
        array_push($error,"last name must have letters only");
    }
    if($age<6){
        array_push($error,"Junior team allow 6 age above");  
    }
    if(strlen(strval($telephone))!=10){
        array_push($error,"Phone number must have 10 digits");  
   
    }
    $select_tel=mysqli_query($conn,"SELECT * from fans where telephone='$telephone'");
    if(mysqli_num_rows($select_tel)==1){
        array_push($error,"Phone number already existed");  
    }
if(count($error)==0){
    $insert=mysqli_query($conn,"UPDATE `fans` SET `f_name` = '$f_name', `l_name` = '$l_name', `age` = '$age', `sex` = '$sex', `telephone` = '$telephone' WHERE `fans`.`f_id` = '$f_id';");
}
if(count($error)!=0){
foreach($error as $item){
    ?>
    <div class='result bg-danger'>
        <?php  echo $item ?> 

    </div>
    <?php 
}
}


}



?>

<!-- // update fans ends -->
    
<?php 
if(isset($_POST['fans'])){
    // <!-- f_id	f_name	l_name	age	sex	telephone	 -->
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $telephone=$_POST['telephone'];
    $error=array();
    //validation
    if(!preg_match('/^07/',$telephone)){
        array_push($error,"PHone number must start with 07");

    }
    if(!preg_match('/^[a-zA-Z ]*$/',$f_name)){
        array_push($error,"first name must have letters only");

    }
    if(!preg_match('/^[a-zA-Z ]*$/',$l_name)){
        array_push($error,"last name must have letters only");

    }
    if($age<6){
        array_push($error,"Junior team allow 6 age above");  
    }
    if(strlen(strval($telephone))!=10){
        array_push($error,"Phone number must have 10 digits");  
   
    }
    $select_tel=mysqli_query($conn,"SELECT * from fans where telephone='$telephone'");
    if(mysqli_num_rows($select_tel)==1){
        array_push($error,"Phone number already existed");  
    }
if(count($error)==0){
    $insert=mysqli_query($conn,"INSERT INTO `fans` (`f_id`, `f_name`, `l_name`, `age`, `sex`, `telephone`) VALUES (NULL, '$f_name', '$l_name', '$age', '$sex', '$telephone')");
}
if(count($error)!=0){
foreach($error as $item){
    ?>
    <div class='result bg-danger'>
        <?php  echo $item ?> 

    </div>
    <?php 
}
}


}



?>



<div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Insert Fans</h5>
                    <button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form action="" method="post">
                  

                        <div class="form-group">
                            <label for="" class="form-label">First name</label>
                            <input type="text" name='f_name' class="form-control" required>   
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Last name</label>
                            <input type="text" name='l_name' class="form-control" required>   
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Age</label>
                            <input type="number" name='age' class="form-control" required>   
                        </div>
                        <div class="form-group">
                            <label for="" class='form-label d-block my-2'>Choose Gender</label>
                        <input type="radio" name='sex' value='male' required>   <label for="" class="form-label mx-2">Male</label>
                        <input type="radio" name='sex' value='female' required>   <label for="" class="form-label mx-2">Female</label>
                         
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Telephone</label>
                            <input type="number" name='telephone' class="form-control" required>   
                        </div>
                

                </div>
                <div class="modal-footer">
                    <button type="submit" name='fans' class="btn bg-green w-25 color-w">Insert</button>
                    <button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-25">Cancel</button>
                </form>
                </div>

            </div>

        </div>

    </div>




















<div class='table-wrapper'>

<div class='table-hd p-2'>
    <button type='button' class='bg-green w-25 btn color-w' data-bs-target='#mymodal' data-bs-toggle='modal'>New</button>
</div>
<table class='table'>
<!-- f_id	f_name	l_name	age	sex	telephone	 -->
	<tr class='hd-tr'>
          <th>Fan Id</th>
          <th>first name</th>
          <th>last name</th>
          <th>age</th>
          <th>sex</th>
          <th>telephone</th>
          <th>Delete</th>
          <th>Update</th>
    </tr>
    <?php
    $result=mysqli_query($conn,"SELECT * from fans");
    while($row=mysqli_fetch_array($result)){
        ?>
        <tr>
        <td><?php echo $row['f_id'] ?></td>
        <td><?php echo $row['f_name'] ?></td>
        <td><?php echo $row['l_name'] ?></td>
        <td><?php echo $row['age'] ?></td>
        <td><?php echo $row['sex'] ?></td>
        <td><?php echo $row['telephone'] ?></td>
        <td><a href="delete.php?f_id=<?php echo $row['f_id'] ?>" class='btn color-green'><i class='fa fa-trash color-g'></i> Delete</a></td>
        <td><a href="update.php?f_id=<?php echo $row['f_id'] ?>" class='btn color-green'><i class='fa fa-edit color-g'></i> Update</a></td>
        </tr>
        <?php 
    }
    ?>

</table>

</div>
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
        <a href="report.php" class="navs-item">Report</a>
         <a href="users.php" class="navs-item">My Account</a>
    </div>
   
    <a href="logout.php?logout" class="logout">Logout</a>

</div>



   </div> 
</body>
</html>