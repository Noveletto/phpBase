<?php
include 'connect.php';
$id = $_GET['ProdutoID']; 

?>
<?php
 if(isset($_POST['sub'])){
    $t=$_POST['nomeProduto'];
    $i="update produto set nomeProduto='$t' where idProduto=$id";
    mysqli_query($con, $i);
    header('location:viewall_produto.php');
 }
     $s="select*from produto where idProduto='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="nomeProduto" value="<?php echo $f['nomeProduto']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>