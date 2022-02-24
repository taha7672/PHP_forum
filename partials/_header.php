<?php
include '_dbconnection.php';
session_start();

 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          
            $sql = "SELECT  category_id , category_title FROM `categories` LIMIT 3"; 
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
             echo  '<li><a class="dropdown-item" href="threadlist.php?catid='. $row['category_id'].'">'. $row['category_title'].'</a></li>';
           }
        echo  '</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" tabindex="-1">Contact</a>
        </li>
      </ul>';
      if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
      echo'<form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="search"  name="search"  placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success"type="submit">Search</button> 
        <a href="partials/_logout.php"> <button class="btn btn-outline-success" type="button">Logout</button> </a>
       </form>';
      }
  else{

        echo'<button  type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
        <button type="button"  class="btn btn-success mx-1"   data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>';
  }
      echo'
    </div>
  </div>  
</nav>';
 include 'partials/_loginmodal.php';
 include 'partials/_signupmodal.php';
 if(isset ($_GET['signupsuccess']) && $_GET['signupsuccess']="true"){
   echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong> You can login now!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
 }
//  if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
//    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
//    <strong>Success!</strong> You are logged in!
//    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//    </div>';
//  }

?>