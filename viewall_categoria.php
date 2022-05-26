<?php
include 'connect.php';
?>
<a href="reg_categoria.php">Adicionar Categoria</a>
<table border='1' align='center'>
    <tr>
        <th>    
            ID Categoria
        </th>
        <th>
            Nome Categoria
        </th>
        <th>
            Excluir
        </th>
        <th>
            Editar
        </th>
    </tr>

<?php
$sq="select * from categoria";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['idCategoria']?>
        </td>
        <td>
            <?php echo $f['nomeCategoria']?>
        </td>
        <td>
        <a href="delete_categoria.php?CategoriaID=<?php echo $f['idCategoria']?>">EXCLUIR</a>
        </td>
        <td>
        <a href="edit_categoria.php?CategoriaID=<?php echo $f['idCategoria']?>">EDITAR</a>
        </td>
    </tr>
    <?php
}
?>