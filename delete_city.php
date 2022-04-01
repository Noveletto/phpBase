<?php
    include 'connect.php';
?>
<?php 
$sq="delete from city where ID_city=8";
mysqli_query($con,$sq);
header('location:viewall_city.php');
?>