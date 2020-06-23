<?php include("config.php");?> 

<?php if (isset($_POST['update'])) {     
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']); 
    $namakopi = mysqli_real_escape_string($mysqli, $_POST['namakopi']);
    $review = mysqli_real_escape_string($mysqli, $_POST['review']);     
    $rating = mysqli_real_escape_string($mysqli, $_POST['rating']);

    // checking empty fields     
    if (empty($namakopi) || empty($username) || empty($review) || empty($rating) ) {         
        if (empty($namakopi)) {             
            echo "<font color='red'>Nama masih belum diisi</font><br/>" ;         
        }                  
        if (empty($username)) {            
            echo "<font color='red'>NIM masih belum diisi</font><br/>";         
        }                  
        if (empty($review)) {             
            echo "<font color='red'>Jurusan masih belum diisi</font><br/>";         
        }                  
        if (empty($rating)) {             
            echo "<font color='red'>Nama masih belum diisi</font><br/>" ;
        }
    } else {         
        //updating the table         
        $result = mysqli_query(             
            $mysqli,             
            "UPDATE review SET Username='$username', NamaKopi='$namakopi', Review= '$review', Rating='$rating' WHERE ID=$id"         
        );                  
        //redirectig to the display page. In our case, it is index.php         
        header("Location: index_admin.php#review");     
    } 
} 
?> 

<?php 
    //getting id from url 
    $id = $_GET['id']; 
    //selecting data associated with this particular id 
    $result = mysqli_query($mysqli, "SELECT * FROM review WHERE ID=$id"); 
    
    while ($res = mysqli_fetch_array($result)) {     
        $namakopi = $res['NamaKopi'];     
        $username = $res['Username'];     
        $review = $res['Review'];     
        $rating = $res['Rating']; 
    } 
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css">

    <title>Edit</title>
  </head>
  <body>
    


    <div class="container">
    <form action="edit_admin.php" method="post" name="form1">
      <div class="row">
        <h2 style="text-align:center">Review Coffeee Skuy</h2>
        
  
          <div class="container">
  
          <input type="text" name="review" for="review" placeholder="Review" value="<?php echo $review;?>" required>
          <input type="text" name="username"for="username" placeholder="username" value="<?php echo $username;?>" required >
          <input type="text" name="namakopi"for="namakopi" placeholder="Nama Kopi" value="<?php echo $namakopi;?>" required >
          <input type="text" name="rating"for="rating" placeholder="Rating" value="<?php echo $rating;?>" required>
          <input type="hidden" name="id" value=<?php echo $_GET['id'] ;?>>  
          <input type="submit" name="update" value="Update">
          <a href="index_admin.php#review" style="color:black" class="btn">Cancel</a>
          
        </div>
      </div>
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>