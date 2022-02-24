<?php
include '_dbconnection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST['loginemail'];
    $password=$_POST['password'];

      
    //  validate user email 
    $sql="SELECT * FROM `users` WHERE signup_email='$email'";
    $result=mysqli_query($conn ,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows == 1){
       $row =mysqli_fetch_assoc($result);
       if(password_verify($password,$row['password'])){
           session_start();
           $_SESSION['loggedin']=true;
           $_SESSION['sno']=$row['sno'];
           $_SESSION['user_email']=$email;
           echo "loged in".$email;
       }
       header ("location: /forum/index.php");
    }
}


?>