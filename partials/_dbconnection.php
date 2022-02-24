<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "idiscuss";

$conn = mysqli_connect($servername,$username,$password ,$database);
//  mysqli_select_db($conn,$database);
if(!$conn){

    die ("Error". mysqli_connect_error());
}

?>