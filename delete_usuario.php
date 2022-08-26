<?php
    include 'connect.php';

    $id = $_GET['id']; 

?>
<?php 
$sq="delete from regclientestcc where id=$id";
mysqli_query($con,$sq);
header('location:totalUsuarios.php');
?>