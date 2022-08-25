<?php
    include 'connect.php';

    $id = $_GET['id']; 

?>
<?php 
$sq="delete from reg where id=$id";
mysqli_query($con,$sq);
header('location:totalRegistros.php');
?>