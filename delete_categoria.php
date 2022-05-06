<?php
    include 'connect.php';

    $id = $_GET['CategoriaID']; 

?>
<?php 
$sq="delete from produto where idCategoria=$id";
mysqli_query($con,$sq);
header('location:viewall_categoria.php');
?>