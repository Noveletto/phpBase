<?php
include 'connect.php';
?>
<a href="reg_produto.php">Adicionar Cidade</a>
<table border='1' align='center'>
    <tr>
        <th>
            ID Produto
        </th>
        <th>
            Nome Produto
        </th>
        <th>
            Excluir
        </th>
        <th>
            Editar
        </th>
    </tr>

<?php
$sq="select * from produto";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['idProduto']?>
        </td>
        <td>
            <?php echo $f['nomeProduto']?>
        </td>
        <td>
        <a href="delete_produto.php?ProdutoID=<?php echo $f['idProduto']?>">EXCLUIR</a>
        </td>
        <td>
        <a href="edit_produto.php?ProdutoID=<?php echo $f['idProduto']?>">EDITAR</a>
        </td>
    </tr>
    <?php
}
?>