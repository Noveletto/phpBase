<?php
include 'connect.php';
include 'checkLogin.php';
if(isset($_POST['sub'])){
    $nameCity=$_POST['text'];

    $i="insert into city(city)value('$nameCity')";
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
                        Nome da Cidade
                        <input type="text" name="text">
                    </td>
                </tr>

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
