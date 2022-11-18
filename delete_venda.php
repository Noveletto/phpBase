<?php
    include 'connect.php';
    $id = $_GET['id']; 

?>
<?php 
$sq="delete from vendas where idVenda=$id";
mysqli_query($con,$sq);
header('location:totalVendas.php');
?>