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
    <div class="container my-4">
        <h1 class="py-3">Search result for <em>"<?php echo $_GET['search']; ?>"</em></h1>
    <?php 
    $noresult= true;
     $query = $_GET["search"];
     $sql = "select * from thread where match (thread_title, thread_desc) against ('$query')"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc']; 
        $thread_id= $row['thread_id'];
        $noresult= false;
        $url = "thread.php?threadid=". $thread_id;
   
        echo '<div class="result">
        <h3><a href="'.$url.'" class="text-dark" >'.$title.'</a></h3>
        <p> '.$desc.' </p>
        </div>';
    }
    if($noresult){
        echo '<div class="my-5 jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Result found</h1>
          <p class="lead">Make sure all words are correctly spelled!</p>
        </div>
      </div>';
    }
       
    ?>
    </div>
            <?php include 'partials/_footer.php'; ?>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                crossorigin="anonymous">
            </script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>