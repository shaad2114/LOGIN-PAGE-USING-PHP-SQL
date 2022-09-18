<?php 
$insert= false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password= "";

$con = mysqli_connect($server ,$username ,$password);

if(!$con){
    die("connection failed due to" . mysqli_connect_error());
}
// echo "connecting to database";

$name = $_POST['name'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$phone= $_POST['phone'];
$email= $_POST['email'];

$sql ="INSERT INTO `loginform`.`loginform` ( `name`, `age`, `gender`, `phone`, `email`, `date`)
VALUES ( '$name', '$age', '$gender', '$phone', '$email', current_timestamp());";

if($con->query($sql)==true){
    $insert = true;
}
else{
    echo "error: $sql <br> $con->error";
}

$con->close(); 

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="lamborghini">
    <div class="container">
        <h1> Login Form </h1>
        <?php
        if($insert == true){
   echo "<p  class='submitMsg'> thanks for submitting the form</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <br>
            <input type="text" name="age" id="age" placeholder="enter your age">
            <br>
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <br>
            <input type="phone" name="phone" id="phone" placeholder="enter your phone number">
            <br>
            <input type="email" name="email" id="email" placeholder="enter your email id">
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>