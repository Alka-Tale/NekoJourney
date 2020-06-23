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
        header("Location: index_admin.php");     
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

    <title>Edit</title>
  </head>
  <body>
    <div class="container mt-4">         
        <h1>Form Edit Data</h1>

        <form class="col-4" method="post" action="edit_admin.php" name="form1">                          
            <div class="form-group">                 
                <label for="namakopi">Nama Kopi</label>                 
                <input type="namakopi" class="form-control" name="namakopi" value="<?php echo $namakopi;?>">             
            </div>             
            <div class="form-group">                 
                <label for="username">Username</label>                 
                <input type="username" class="form-control" name="username" value="<?php echo $username;?>">             
            </div>             
            <div class="form-group">                 
                <label for="review">Review</label>                 
                <input type="review" class="form-control" name="review" value="<?php echo $review;?>">             
            </div>             
            <div class="form-group">                 
                <label for="rating">Rating</label>                 
                <input type="rating" class="form-control" name="rating" value="<?php echo $rating;?>">             
            </div>             
            <input type="hidden" name="id" value=<?php echo $_GET['id'] ;?>>             
            <button type="submit" name="update" class="btn btn-primary">Update</button>             
            <a href="index_admin.php"><button type="button" class="btn btn-success">Home</button></a>           
        </form> 
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>