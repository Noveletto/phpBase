<?php

include'connect.php';

if(isset($_POST['sub'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $s= "select * from reg where username='$u' and password= '$p'";   
   $qu= mysqli_query($con, $s);
   if(mysqli_num_rows($qu)>0){
      $f= mysqli_fetch_assoc($qu);
      $_SESSION['id']=$f['id'];
      header ('location:home.php');
   }
   else{
    echo  "<script>alert('Nome de usuário ou senha estão incorretos ou não estão cadastrados!');</script>";
   }
  
}
?>
<html>
      
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">

        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: URL('data:image/jpeg;base64,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');
                background-size: 100%;
            }   
            div{
                background-color: rgba(0, 0, 0, 0.8);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                padding: 80px;
                border-radius: 15px;
                color: #fff;
            }
            input{
                padding:15px;
                border: none;
                outline: none;
                font-size: 15px;
            }
            button{
                background-color: dodgerblue;
                border:none;
                padding:15px;
                width:100%;
                border-radius: 10px;
                color: #fff;
                font-size:15px;
            }
            button:hover{
                background-color: deepskyblue;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <div>
        <h1>Login</h1>
        <form method="POST" enctype="multipart/form-data">
            <table>
                
                <tr>
                    <td>
                        <input type="text" name="user" placeholder="Usuário">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pass" placeholder="Senha">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub" value="submit">
                    </td>
                    <td><button type="submit" name="sub" value="Entrar"><a href="reg.php">Cadastrar</a></button></td>
                </tr>
            </table>
        </div>
    </body>
</html>
