<?php 
include('connection.php');
include('fpdf/fpdf.php');
if(isset($_POST['report'])){
    $week=$_POST['week'];
    $r=1;

    $week_arr=explode('-W',$week);
   $year=$week_arr[0];
   $week_no=$week_arr[1];
   $result=mysqli_query($conn,"SELECT * from((participation INNER JOIN meetings on participation.m_id=meetings.m_id) INNER JOIN fans on participation.f_id=fans.f_id)  where week(participation.date)='$week_no' and year(participation.date)='$year'");
   $p = new FPDF('L','mm','A4');
   $p->AddPage();
   $p->SetFont('Arial','B',18);
   $p->SetMargins(30,60,30,60);
   $p->Cell('90');
   $p->Cell('50','25',' Report of Week '.$week_no." of ".$year. " ",0,1);
   $p->Ln(0);
  
   $p->Cell('20','10','No',1,0);
   $p->Cell('80','10','Meeting',1,0);
   $p->Cell('70','10','fan',1,0);
   $p->Cell('30','10','user',1,0);
   $p->Cell('30','10','date',1,1);
   $p->SetFont('Arial','',12);
   
   while($row=mysqli_fetch_array($result)){
    
    $p->Cell('20','10',$r++,1,0);
    $p->Cell('80','10',$row['purpose'],1,0);
    $p->Cell('70','10',$row['f_name']." ".$row['l_name'],1,0);
    $user_id=$row['user_id'];
    $user_info=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users where user_id='$user_id'"));
    $p->Cell('30','10',$user_info['u_name'],1,0);
    $p->Cell('30','10',$row['date'],1,1);
    $p->SetFont('Arial','',12);
   }
   
 
}
$p->Output();


?>