<?php
include("config.php");
$ID = $_GET['ID'];
$result = mysqli_query($mysqli, "DELETE FROM review WHERE ID=$ID
");
if( $ID > 0){
    echo"
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index_admin.php#review';
        </script>
        ";
}else{
    echo"
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'index_admin.php#review';
    </script>
    ";
    echo"<br>";
    echo mysqli_error($mysqli);
}
?>