<?php
    include 'connect.php';
    $id = $_GET['id']; 

?>
<?php 
$sq="delete from produtos where id=$id";
mysqli_query($con,$sq);
header('location:totalProdutos.php');
?>