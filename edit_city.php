<?php
include 'connect.php';
include 'checkLogin.php';
$id = $_GET['idCity']; 

?>
<?php
 if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $i="update city set city='$t' where ID_city=$id";
    mysqli_query($con, $i);
    header('location:home.php');
 }
     $s="select*from city where ID_city='$_SESSION[ID_city]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="text" value="<?php echo $f['text']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>