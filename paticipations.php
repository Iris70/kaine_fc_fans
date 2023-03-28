<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['u_name'])){
    header('location:index.php');
}
$u_name=$_SESSION['u_name'];
$user=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where u_name='$u_name'"));
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
    <script>
        $(document).ready(function(){
            $('#m_id').on('change',function(){
                var m_id=$(this).val();
                $.post('ret_metting.php',{m_id:m_id},function(data){
                    $('table').html(data);
                })
            })
            $('.delete').on('click',function(e){
                e.preventDefault();
                var confirms=confirm('are you sure you want to delete');
                var link=$(this).attr('href');
                if(confirms==true){
window.location.href=link;
                }
                else{
                    window.location.href='paticipations.php';
                }
            })
        })
    </script>
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



if(isset($_POST['u_participations'])){
    // <!-- f_id	f_name	l_name	age	sex	telephone	 -->
    $p_id=$_POST['p_id'];
    $m_id=$_POST['m_id'];
    $f_id=$_POST['f_id'];
    // $user_id=$user['user_id'];
    $date=$_POST['date'];
    
    $error=array();
    //validation

if(count($error)==0){
    $insert=mysqli_query($conn,"UPDATE `participation` SET `m_id` = '$m_id', `f_id` = '$f_id', `date` = '$date' WHERE `participation`.`p_id` = '$p_id'");

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
if(isset($_POST['participations'])){

    // p_id	m_id	f_id	user_id	date	
    $m_id=$_POST['m_id'];
    $f_id=$_POST['f_id'];
    $user_id=$user['user_id'];
    $date=$_POST['date'];
    $error=array();
    // participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id)
    $select=mysqli_query($conn,"SELECT * from participation  INNER JOIN meetings on participation.m_id=meetings.m_id where participation.f_id='$f_id' and participation.m_id='$m_id' and participation.date='$date'");
    if(mysqli_num_rows($select)==1){
        $meeting=mysqli_fetch_array($select);
        array_push($error,"already attended the meeting of ".$meeting['purpose']." at ".$date);
    }

if(count($error)==0){
    $insert=mysqli_query($conn,"INSERT INTO `participation` (`p_id`, `m_id`, `f_id`, `user_id`, `date`) VALUES (NULL, '$m_id', '$f_id', '$user_id', '$date');");

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
                    <h5>Insert Participations</h5>
                    <button type='button' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form action="" method="post">
                  
                        <div class="form-group">
                            <label for="" class="form-label">Purpose</label>
                          <select name="m_id" id="" required class='form-select'>
                            <?php
                            $result=mysqli_query($conn,"SELECT * from meetings");
                            while($row=mysqli_fetch_array($result)){
                                ?>
  <option value="<?php echo $row['m_id'] ?>"><?php echo $row['purpose'] ?></option>
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
                        ?>
 <option value="<?php echo $row['f_id'] ?>"><?php echo $row['f_name']." ".$row['l_name'] ?> </option>
                        <?php 
                     }
                        ?>
                       
                    </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="" class="form-label">date</label>
                            <input type="date"  name='date' class="form-control" required>   
                        </div>
                       
                       
                

                </div>
                <div class="modal-footer">
                    <button type="submit" name='participations' class="btn bg-green w-25 color-w">Insert</button>
                    <button type="button" data-bs-dismiss="modal" class="btn bg-secondary color-w w-25">Cancel</button>
                </form>
                </div>

            </div>

        </div>

    </div>




















<div class='table-wrapper'>

<div class='table-hd p-2'>
    <button type='button' class= 'd-inline bg-green w-25 btn color-w' data-bs-target='#mymodal' data-bs-toggle='modal'>New</button>
    <select name="m_id" id="m_id" required class='form-select d-inline w-50' >
                            <?php
                            $result=mysqli_query($conn,"SELECT * from meetings");
                            while($row=mysqli_fetch_array($result)){
                                ?>
  <option value="<?php echo $row['m_id'] ?>"><?php echo $row['purpose'] ?></option>
                                <?php 
                            }
                             ?>
                          
                          </select> 
</div>
<table class='table'>
     <!-- p_id	m_id	f_id	user_id	date	 -->
	<tr class='hd-tr'>
          <th>Participation Id</th>
          <th>Meeting</th>
          <th>Fan</th>
          <th>user</th>
          <th>date</th>
          <th>Delete</th>
          <th>Update</th>
    </tr>
    <?php
    $result=mysqli_query($conn,"SELECT * from((participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id)");
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

    <td><a class='delete' href="delete.php?p_id=<?php echo $row['p_id'] ?>" class='btn color-green'><i class='fa fa-trash color-g'></i> Delete</a></td>
    <td><a  href="update.php?p_id=<?php echo $row['p_id'] ?>" class='btn color-green'><i class='fa fa-edit color-g'></i> Update</a></td>
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