<?php
include("config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['Submit'])) {
 $email = mysqli_real_escape_string($mysqli, $_POST['email']);
 $username = mysqli_real_escape_string($mysqli, $_POST['username']);
 $password = mysqli_real_escape_string($mysqli, $_POST['password']);

 // checking empty fields
 if(empty($email) || empty($username) || empty($password)) {

 if(empty($email)) {
 echo "<font color='red'>Nama masih belum diisi</font><br/>";
 }

 if(empty($username)) {
 echo "<font color='red'>NIM masih belum diisi</font><br/>";
 }

 if(empty($password)) {
 echo "<font color='red'>Jurusan masih belum diisi</font><br/>";
 }

 

 //link to the previous page
 echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
 } else {
 // if all the fields are filled (not empty)

 //insert data to database
 $result = mysqli_query($mysqli, "INSERT INTO user(Email, Username, Password) VALUES('$email','$username','$password')");

 //display success message
 echo"
    <script>
        alert('Selamat ! Registrasi Sukses Cuy');
        document.location.href = 'login.html';
    </script>
    ";
 }
}
?>
</body>
</html>
