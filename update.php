<?php 
include('connection.php');
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
    // update fans starts here
if(isset($_GET['f_id'])){
    $f_id=$_GET['f_id'];
    $fans=mysqli_fetch_array(mysqli_query($conn,"SELECT * from fans where f_id='$f_id'"));
    ?>
        <script>
            $(document).ready(function(){
                $('.modal').modal('show');  
            })
        </script>

    <div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Update <?php echo $fans['f_name']." ".$fans['l_name'] ?></h5>
                   <a href="fans.php"><button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a> 

                </div>
                <div class="modal-body">
                   
                <form action="fans.php" method="post">
                  

                  <div class="form-group">
                      <label for="" class="form-label">First name</label>
                      <input type="text" name='f_name' value="<?php echo $fans['f_name'] ?>" class="form-control" required>   
                      <input type="number" name='f_id' value="<?php echo $fans['f_id'] ?>" class="form-control" required hidden>   
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">Last name</label>
                      <input type="text" name='l_name'  value="<?php echo $fans['l_name'] ?>" class="form-control" required>   
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">Age</label>
                      <input type="number" name='age'  value="<?php echo $fans['age'] ?>" class="form-control" required>   
                  </div>
                  <div class="form-group">
                    <?php 
if($fans['sex']=='male'){
    ?>
   <label for="" class='form-label d-block my-2'>Choose Gender</label>
                  <input type="radio" name='sex' value='male' required checked>   <label for="" class="form-label mx-2">Male</label>
                  <input type="radio" name='sex' value='female' required>   <label for="" class="form-label mx-2">Female</label>
    <?php
}
if($fans['sex']=='female'){
    ?>
   <label for="" class='form-label d-block my-2'>Choose Gender</label>
                  <input type="radio" name='sex' value='male' required>   <label for="" class="form-label mx-2">Male</label>
                  <input type="radio" name='sex' value='female' required checked>   <label for="" class="form-label mx-2">Female</label>
    <?php
}

                    ?>
                   
                   
                  </div>
                  <div class="form-group">
                      <label for="" class="form-label">Telephone</label>
                      <input type="number" name='telephone' class="form-control"  value="<?php echo $fans['telephone'] ?>" required>   
                  </div>
          
                

                </div>
                <div class="modal-footer">
                <button type="submit" name='u_fans' class="btn bg-green w-25 color-w">Update</button>

                   <a href='fans.php'><button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-100" > Cancel</button></a>
                </form>
                </div>

            </div>

        </div>

    </div>
    <?php 
}
// update fans ends here

    // update meeting starts here
if(isset($_GET['m_id'])){
    $m_id=$_GET['m_id'];
    $meetings=mysqli_fetch_array(mysqli_query($conn,"SELECT * from meetings where m_id='$m_id'"));
    ?>
        <script>
            $(document).ready(function(){
                $('.modal').modal('show');  
            })
        </script>

    <div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Update Meeting: <?php echo $meetings['purpose'] ?></h5>
                   <a href="meeting.php"><button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a> 

                </div>
                <div class="modal-body">
                   
                <form action="meeting.php" method="post">
                  

                <div class="form-group">
                            <label for="" class="form-label">Purpose</label>
                            <input type="text" name='purpose' class="form-control" value='<?php echo $meetings['purpose'] ?>' required>   
                            <input type="number" name='m_id' class="form-control" value='<?php echo $meetings['m_id'] ?>' hidden>   
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Location</label>
                            <input type="text" name='location' class="form-control" value='<?php echo $meetings['location'] ?>' required>   
                        </div>
                

                </div>
                <div class="modal-footer">
                <button type="submit" name='u_meetings' class="btn bg-green w-25 color-w">Update</button>

                   <a href='meeting.php'><button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-100" > Cancel</button></a>
                </form>
                </div>

            </div>

        </div>

    </div>
    <?php 
}
// update meeting ends here
    // update meeting starts here
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    $users=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id='$user_id'"));
    ?>
        <script>
            $(document).ready(function(){
                $('.modal').modal('show');  
            })
        </script>

    <div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Update User: <?php echo $users['u_name']." Account " ?></h5>
                   <a href="users.php"><button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a> 

                </div>
                <div class="modal-body">
                   
                <form action="users.php" method="post">
                  

                <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name='u_name' class="form-control" value='<?php echo $users['u_name'] ?>' required>   
                            <input type="number" name='user_id' class="form-control" value='<?php echo $users['user_id'] ?>' hidden>   
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Old Password</label>
                            <input type="password" name='old_password' class="form-control"  required>   
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" name='new_password' class="form-control"  required>   
                        </div>
                

                </div>
                <div class="modal-footer">
                <button type="submit" name='u_user' class="btn bg-green w-25 color-w">Update</button>

                   <a href='users.php'><button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-100" > Cancel</button></a>
                </form>
                </div>

            </div>

        </div>

    </div>
    <?php 
}
// update meeting ends here

//update participation start here




if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
    $participations=mysqli_fetch_array(mysqli_query($conn,"SELECT * from((participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id) where participation.p_id='$p_id'"));
    ?>
        <script>
            $(document).ready(function(){
                $('.modal').modal('show');  
            })
        </script>

    <div class="modal fade" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Participation of meeting: <?php echo $participations['purpose'] ?></h5>
                   <a href="paticipations.php"><button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a> 

                </div>
                <div class="modal-body">
                   
                <form action="paticipations.php" method="post">
                  
<input type="number" name="p_id" value='<?php echo $participations['p_id'] ?>' id="" hidden>
                <div class="form-group">
                            <label for="" class="form-label">Purpose</label>
                          <select name="m_id" id="" required class='form-select'>
                            <?php
                            $result=mysqli_query($conn,"SELECT * from meetings");
                            while($row=mysqli_fetch_array($result)){
                                if($row['m_id']==$participations['m_id']){
                                    ?>
                                
                                <option value="<?php echo $row['m_id'] ?>" selected><?php echo $row['purpose'] ?></option>
                                    <?php 
                                
                                }
                                else{
                                    ?>
                                                <option value="<?php echo $row['m_id'] ?>"><?php echo $row['purpose'] ?></option>
   
                                    <?php 
                                }
                                ?>

                                <?php 
                            }
                             ?>
                          
                          </select>  
                        </div>
                        <div class="form-group">
                                              

                            <label for="" class="form-label">fan</label>
                    <select name="f_id" id="" class='form-select'>
                        <?php 
                     $fans=mysqli_query($conn,"SELECT * from fans");
                     while($row=mysqli_fetch_array($fans)){
                        if($row['f_id']==$participations['f_id']){
                            ?>
 <option value="<?php echo $row['f_id'] ?>" selected><?php echo $row['f_name']." ".$row['l_name'] ?> </option>

                            <?php
                        }
                        else{
                            ?>
 <option value="<?php echo $row['f_id'] ?>"><?php echo $row['f_name']." ".$row['l_name'] ?> </option>

                            <?php
                        }
                        ?>
                        <?php 
                     }
                        ?>
                       
                    </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="" class="form-label">date</label>
                            <input type="date"  value='<?php echo $participations['date'] ?>' name='date' class="form-control" required>   
                        </div>

                </div>
                <div class="modal-footer">
                <button type="submit" name='u_participations' class="btn bg-green w-25 color-w">Update</button>

                   <a href='paticipations.php'><button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-100" > Cancel</button></a>
                </form>
                </div>

            </div>

        </div>

    </div>
    <?php 
}



//update participation ends here
?>

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