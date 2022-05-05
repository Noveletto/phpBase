<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $g=$_POST['gen'];
    
    $i="insert into produto(nomeProduto,precoProduto,fk_idCategoria)value('$t','$u', '$g')";
    mysqli_query($con, $i);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Nome Produto
                        <input type="text" name="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Preço Produto
                        <input type="text" name="user">
                    </td>
                </tr>
                <tr>
                    <td>
                        Categoria
                        <select name="gen">
                            <option value="">-select-</option>
                            <?php
                            $sqlCity = mysqli_query($con, "select * from categoria");

                            while($item = mysqli_fetch_assoc($sqlCity))
                            {
                                $nomeItem = $item["nomeCategoria"];
                                $idCity = $item["idCategoria"];
                                echo"
                                <option value=$idCity>$nomeItem</option>
                                ";
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Cadastrar" name="sub">       
                    </td>
                    <td> 
                        <a href="login.php">Já tenho um login</a> 
                    </td>
                </tr>
            </table>
    </body>
</html>
