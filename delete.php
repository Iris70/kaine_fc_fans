
<?php 
include ('connection.php');
if(isset($_GET['f_id'])){
    $f_id=$_GET['f_id'];
    $delete=mysqli_query($conn,"DELETE from fans where f_id='$f_id'");
    header('location:fans.php');
}
if(isset($_GET['m_id'])){
    $m_id=$_GET['m_id'];
    $delete=mysqli_query($conn,"DELETE from meetings where m_id='$m_id'");
    header('location:meeting.php');
}
if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
    $delete=mysqli_query($conn,"DELETE from participation where p_id='$p_id'") or die(mysqli_error);
    header('location:paticipations.php');
}




?>