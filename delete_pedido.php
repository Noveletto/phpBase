<?php
    include 'connect.php';
    $id = $_GET['id']; 

?>
<?php 
$sq="delete from pedidos where id=$id";
mysqli_query($con,$sq);
header('location:totalPedidos.php');
?>