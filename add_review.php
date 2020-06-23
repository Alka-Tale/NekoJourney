<?php
include("config.php");

if(isset($_POST['Submit'])) {
 $review = mysqli_real_escape_string($mysqli, $_POST['review']);
 $username = mysqli_real_escape_string($mysqli, $_POST['username']);
 $namakopi = mysqli_real_escape_string($mysqli, $_POST['namakopi']);
 $rating = mysqli_real_escape_string($mysqli, $_POST['rating']);

 // checking empty fields
 if(empty($review) || empty($username) ||empty($namakopi) || empty($rating)) {

 if(empty($review)) {
 echo "<font color='red'>Nama masih belum diisi</font><br/>";
 }

 if(empty($username)) {
 echo "<font color='red'>NIM masih belum diisi</font><br/>";
 }

 if(empty($namakopi)) {
    echo "<font color='red'>NIM masih belum diisi</font><br/>";
    }

 if(empty($rating)) {
 echo "<font color='red'>Jurusan masih belum diisi</font><br/>";
 }

 

 //link to the previous page
 echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
 } else {
 // if all the fields are filled (not empty)

 //insert data to database
 $result = mysqli_query($mysqli, 
 "INSERT INTO review(Review, Username, NamaKopi, Rating) 
 VALUES('$review','$username','$namakopi','$rating')");

 //display success message
 header("location:index.php#review");
 }
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

    <title>Tambah Data</title>
  </head>
  <body>
 
      <div class="container">
        <h1>Review</h1>
        <form class="col-4" action="add_review.php" method="post" name="form1">
            <div class="container center">
                <div class="form-group">
                    <label for="review">Review</label>
                    <input type="text" class="form-control" name="review">
                    </div>
                    <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                    <label for="namakopi">Nama Kopi</label>
                    <input type="text" class="form-control" name="namakopi">
                    </div>
                    <div class="form-group">
                    <label for="rating">rating</label>
                    <input type="rating" class="form-control" name="rating">
                    </div>
          
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                    
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