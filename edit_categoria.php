<?php
include 'connect.php';
$id = $_GET['CategoriaID']; 

?>
<?php
 if(isset($_POST['sub'])){
    $t=$_POST['nomeCategoria'];
    $i="update categoria set nomeCategoria='$t' where idCategoria=$id";
    mysqli_query($con, $i);
    header('location:viewall_categoria.php');
 }
     $s="select*from categoria where idCategoria='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="nomeCategoria" value="<?php echo $f['nomeCategoria']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>