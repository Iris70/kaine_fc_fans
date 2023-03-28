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
include('connection.php');
if(isset($_POST['m_id'])){
    $m_id=$_POST['m_id'];
    $result=mysqli_query($conn,"SELECT * from((participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id) where participation.m_id='$m_id'");




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

    <td><a href="delete.php?p_id=<?php echo $row['p_id'] ?>" class='btn color-green'><i class='fa fa-trash color-g'></i> Delete</a></td>
    <td><a href="update.php?p_id=<?php echo $row['p_id'] ?>" class='btn color-green'><i class='fa fa-edit color-g'></i> Update</a></td>
    </tr>
    <?php 
}
?>
</table>
<?php 
}
?>


