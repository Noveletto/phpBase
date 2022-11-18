<?php
    include 'connect.php';
    $id = $_GET['id']; 

?>
<?php 
$sq="delete from funcionarios where idFuncionario=$id";
mysqli_query($con,$sq);
header('location:totalProdutos.php');
?>