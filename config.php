<?php 
$db_host = 'localhost'; 
$db_name = 'coffee_journey'; 
$db_username = 'root'; 
$db_password = ''; 
 
$mysqli = mysqli_connect($db_host, $db_username, $db_password,  
$db_name);  

function registrasi ($data){
    global $mysqli;

    $email = strtolower(stripslashes($data["email"]));
    $username = strtolower(stripslashes($data["username"]));
    $pass = mysqli_real_escape_string($mysqli,$data["pass"]);
    $pass2 = mysqli_real_escape_string($mysqli,$data["pass2"]);

    if($pass !== $pass2){
        echo "<script>
            alert('Password beda');
            </script>";
        return false;
    }
    return 1;
}

?>