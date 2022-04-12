<?php
include 'connect.php';
?>
<a href="reg_city.php">Adicionar Cidade</a>
<table border='1' align='center'>
    <tr>
        <th>
            ID Cidade
        </th>
        <th>
            Nome Cidade
        </th>
        <th>
            Excluir
        </th>
    </tr>

<?php
$sq="select * from city";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $f['ID_city']?>
        </td>
        <td>
            <?php echo $f['city']?>
        </td>
        <td>
        <a href="delete_city.php?idCity=<?php echo $f['ID_city']?>">EXCLUIR</a>
        </td>
    </tr>
    <?php
}
?>