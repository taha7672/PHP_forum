<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/style.css">
    <title>iDiscuss</title>
</head>

<body>
    <!-- connections with partials folders  -->
    <?php include'partials/_dbconnection.php';?>
    <?php include'partials/_header.php';?>
   
    <?php
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)){ 
      $cattitle = $row['category_title'];
      $catdesc = $row['category_description'];
  }
      
    ?>
        <?php
        $showalert=false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        $sno=$_POST['sno'];
        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `datetime`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp());"; 
        $result = mysqli_query($conn, $sql);
        $showalert=true;
        }
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your problem has been added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <div class="container my-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $cattitle; ?> form </h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>No spam. ... <br>
                No foul language. ... <br>
                No derogatory or inflammatory comments. <br>
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
     if(isset ($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
        echo '<div class="container">
        <h2 class="py-2">Strart discussion</h2>
        <form action=" '.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"> Keep your problem as short and cricp as possible.</div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Elubrate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.  $_SESSION['sno'] .'">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>';
     }
    else{
        echo    '<div class="container">
        <h2 class="py-2">Strart discussion</h2>
        <p>Please log in your are not logged in!</p>
        </div>';
    }
    ?>
  


    <div class="container" id=ques>
        <h2 class="py-2">Browse Question</h2>
        <?php
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `thread` WHERE thread_cat_id=$id"; 
  $result = mysqli_query($conn, $sql);
  $noresult=true;
  while($row = mysqli_fetch_assoc($result)){
    $noresult=false;
      $id = $row['thread_id'];
      $title = $row['thread_title'];
      $desc = $row['thread_desc'];
        $thread_time=$row['datetime'];
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT signup_email FROM `users` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2= mysqli_fetch_assoc($result2);


    
       echo '<div class="d-flex my-4" >
            <div class="flex-shrink-0">
                <img src="img/user.png" width="60px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
            <h6 class="font-weight-bold my-0"> '.$row2['signup_email'].' At '.$thread_time.' </h6>
                <h5 class="mt-0" >  <a class="text-dark" href="threads.php?threadid='.$id.'"> '.$title.'</a></h5>
          <p class="mb-5"> '.$desc.' </p>
            </div>
        </div>';
  }
     
        if($noresult){
            echo '<div class="my-5 jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No threads found</h1>
              <p class="lead">Be the first one to ask question.</p>
            </div>
          </div>';
        }
        echo'</div>
        </div>';
        ?>
   



    <?php   include'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
