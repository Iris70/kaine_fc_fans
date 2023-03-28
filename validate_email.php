<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <!-- <input type="email" name="email" id=""> -->
    <input type="tel" name="tel" id="" minlength='10' minlength='10' pattern='[0-9]{10}'>
        <button type="submit" name='submit'>Submit</button>
    </form>
    <?php
if(isset($_POST['submit'])){
    // $email=$_POST['email'];
    // if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    //     echo 'error';
    // }
    // else{
    //     echo 'correct';
    // }
$phone= $_POST['tel'];

// echo substr($phone,0,2);
$start=substr($phone,0,2);
// echo gettype($start)."<br>";
if($start=='07'){
    echo 'correct';
}
else{
    echo 'false';
}

}





    ?>
</body>
</html>
